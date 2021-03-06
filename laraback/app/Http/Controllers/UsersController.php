<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends CrudController
{
    public $storeRules = [
        'name' => 'required|min:4|max:255|unique:users',
        'email' => 'required|min:5|max:255',
        'password' => 'required|min:8|max:255',
        'valid' => 'required',
        'role_id' => 'required|exists:user_roles,id',
    ];

    public $updateRules = [
        'name' => 'min:4|max:255|unique:users,name',
        'email' => 'min:5|max:255|unique:users,email',
        'password' => 'min:8|max:255',
        'role_id' => 'exists:user_roles',
        'valid' => 'required',
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $user = User::create([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => bcrypt(trim($request->password)),
            'valid' => $request->valid,            
            'role_id' => $request->role_id,
            'state_id' => $request->state_id ? $request->state_id : 1,
            'last_name' => trim($request->last_name),
            'first_name' => trim($request->first_name),
            'secours_email' => trim($request->secours_email),
            'other_secours_email' => trim($request->other_secours_email),
            'website_1' => trim($request->website_1),
            'website_2' => trim($request->website_2),
        ]);
        return $this->crudCreate($user);
    }

    public function index()
    {
        return $this->crudReadAll(User::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(User::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $user = User::find($id)) {
            return $this->crudUpdate(null);
        }
        $user->role_id = $request->role_id ? $request->role_id : $user->role_id;
        $user->state_id = $request->state_id ? $request->state_id : $user->state_id;
        $user->valid = $request->valid;
        $user->name = $request->name ? trim($request->name) : $user->name;
        $user->email = $request->email ? trim($request->email) : $user->email;
        $user->password = $request->password ? bcrypt(trim($request->password)) : $user->password;
        $user->last_name = $request->last_name ? trim($request->last_name) : $user->last_name;
        $user->first_name = $request->first_name ? trim($request->first_name) : $user->first_name;
        $user->secours_email = $request->secours_email ? trim($request->secours_email) : $user->secours_email;
        $user->other_secours_email = $request->other_secours_email ? trim($request->other_secours_email) : $user->other_secours_email;
        $user->website_1 = $request->website_1 ? trim($request->website_1) : $user->website_1;
        $user->website_2 = $request->website_2 ? trim($request->website_2) : $user->website_2;
        $user->save();
        return $this->crudUpdate($user);
    }

    public function destroy($id)
    {
        if (! $user = User::find($id)) {
            return $this->crudDelete(null);
        }
        $user->delete();
        return $this->crudDelete($user);
    }

    /*
    Not In Use
    */
    public function create()
    {
        return $this->crudNotImplemented();
    }

    public function edit($id)
    {
        return $this->crudNotImplemented();
    }
}
