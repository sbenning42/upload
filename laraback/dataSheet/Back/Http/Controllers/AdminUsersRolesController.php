<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserRole;

class AdminUsersRolesController extends ControllerHelper
{
    private function _validateStore($request) {
        $this->validate($request, [
            'user_id' => 'required|exists:users',
            'role_id' => 'required|exists:roles',
        ]);
    }

    private function _validateUpdate($request) {
        $this->validate($request, [
            'user_id' => 'required|exists:users',
            'role_id' => 'required|exists:roles',
        ]);
    }

    private function _handleIndex() {
        $this->setSuccess(UserRole::all(), 200);
    }

    private function _handleStore($request) {
        if (! $urole = UserRole::create([
                'user_id' => trim($request->user_id),
                'role_id' => trim($request->user_id),
            ])) {
            $this->setError([
                'error' => 'Create user role error',
                'message' => 'User role cannot be create',
            ], 422);
        } else {
            $this->setSuccess([
                'message' => 'User role created successfully',
                'user role' => $urole,
            ], 201);
        }
    }

    private function _handleShow($id) {
        if (! $urole = UserRole::find($id)) {
            $this->setError([
                'error' => 'Show user role error',
                'message' => 'User role cannot be found',
            ], 422);
        } else {
            $this->setSuccess($urole, 200);
        }
    }

    private function _handleUpdate($request, $id) {
        if (! $urole = UserRole::find($id)) {
            $this->setError([
                'error' => 'Update user role error',
                'message' => 'User role cannot be found',
            ], 422);
        } else {
            $urole->user_id = trim($request->user_id);
            $urole->role_id = trim($request->role_id);
            $urole->save();
            $this->setSuccess([
                'message' => 'User role successfully updated',
                'user role' => $urole,
            ], 200);
        }
    }

    private function _handleDestroy($id) {
        if (! $urole = UserRole::find($id)) {
            $this->setError([
                'error' => 'Delete user role error',
                'message' => 'User role cannot be found',
            ], 422);
        } else {
            $urole->delete();
            $this->setSuccess([
                'message' => 'User role successfully deleted',
            ], 200);
        }
    }

    public function index() {
        $this->_handleIndex();
        return $this->response();
    }

    public function create() { }

    public function store(Request $request) {
        $this->_validateStore($request);
        $this->_handleStore($request);
        return $this->response();
    }

    public function show($id) {
        $this->_handleShow($id);
        return $this->response();
    }

    public function edit($id) { }

    public function update(Request $request, $id) {
        $this->_validateUpdate($request);
        $this->_handleUpdate($request, $id);
        return $this->response();
    }

    public function destroy($id) {
        $this->_handleDestroy($id);
        return $this->response();
    }
}
