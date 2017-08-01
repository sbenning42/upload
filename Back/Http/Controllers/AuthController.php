<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\User;
use App\UserRole;
use App\Activation;
use JWTAuth;

class AuthController extends ControllerHelper
{
    private function _validateRegister($request) {
        $this->validate($request, [
            'email' => 'required|unique:users,email',
            'name' => 'required|min:4|unique:users,name',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $this->request = $request;
        return $this;
    }

    private function _validateActivate($request) {
        $this->validate($request, [
            'token' => 'required|exists:activations,token',
        ]);
        $this->request = $request;
        return $this;
    }

    private function _validateLogin($request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $this->request = $request;
        return $this;
    }

    private function _createUser() {
        $errorUserCreation = ['error' => 'User creation error'];
        $userData = [
            'email' => trim($this->request->email),
            'name' => trim($this->request->name),
            'password' => bcrypt($this->request->password),
        ];
        $this->user = User::create($userData);
        if (! $this->user) {
            $this->setError($errorUserCreation, 422);
            return null;
        }
        return $this;
    }

    private function _createActivationToken() {
        $errorTokenCreation = ['error' => 'Token creation error'];
        $ttl = ['exp' => Carbon::now()->addDays(1)->timestamp];
        $this->activationToken = JWTAuth::fromUser($this->user, $ttl);
        if (! $this->activationToken) {
            $this->setError($errorTokenCreation, 422);
            return null;
        }
        return $this;
    }

    private function _createActivation() {
        $errorActivationCreation = ['error' => 'Activation creation error'];
        $activationData = [
            'user_id' => $this->user->id,
            'completed' => 0,
            'token' => $this->activationToken,
        ];
        $this->activation = Activation::create($activationData);
        if (! $this->activation) {
            $this->setError($errorActivationCreation, 422);
            return null;
        }
        return $this;
    }

    private function _successRegister() {
        $this->setSuccess([
            'message' => 'Success Register',
            'user' => $this->user,
            'activation' => $this->activation,
        ], 201);
    }

    private function _handleActivate($request) {
        if (! $user = JWTAuth::toUser($request->token)) {
            $this->setError([
                'message' => 'Activation failure',
                'errors' => 'Could not retrieve user',
            ], 422);
        } else {
            $activation = Activation::all()->where('user_id', $user->id)->first();
            $activation->completed = 1;
            $activation->save();
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 2,
            ]);
            $this->setSuccess([
                'message' => 'Activation success',
                'user' => $user,
            ], 200);
        }
    }

    private function _handleLogin($request) {
        if (! $token = JWTAuth::attempt($request->only([
                'email',
                'password',
            ]))) {
            $this->setError([
                'message' => 'Login failure',
                'errors' => 'Invalid credentials',
            ], 401);
        } else if (! $user = JWTAuth::toUser($token)) {
            $this->setError([
                'message' => 'Login failure',
                'errors' => 'Could not retrieve user',
            ], 422);
        } else {
            $activation = Activation::all()->where('user_id', $user->id)->first();
            if (! $activation) {
                $this->setError([
                    'message' => 'Login failure',
                    'errors' => 'User is not activable',
                ], 422);
            } else if (! $activation->completed) {
                $this->setError([
                    'message' => 'Login failure',
                    'errors' => 'User is not activated',
                ], 422);
            } else {
                $this->setSuccess([
                    'message' => 'Login success',
                    'user' => $user,
                    'token' => $token,
                ], 200);
            }
        }
    }

    private function _handleLogout($request) {
        if (! $token = JWTAuth::getToken()) {
            $this->setError([
                'message' => 'Logout failure',
                'errors' => 'Could not retrieve user',
            ], 422);
        } else {
            JWTAuth::invalidate($token);
            $this->setSuccess([
                'message' => 'Logout success',
            ], 200);
        }
    }

    public function register(Request $request) {
        $this
            ->_validateRegister($request)
            ->_createUser()?
            ->_createActivationToken()?
            ->_createActivation()?
            ->_successRegister();
        return $this->response();
    }

    public function activate(Request $request) {
        $this->_validateActivate($request);
        $this->_handleActivate($request);
        return $this->response();
    }

    public function login(Request $request) {
        $this->_validateLogin($request);
        $this->_handleLogin($request);
        return $this->response();
    }

    public function logout(Request $request) {
        $this->_handleLogout($request);
        return $this->response();
    }
}