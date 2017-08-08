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
    ];

    public $updateRules = [
        'name' => 'min:4|max:255|unique:users,name',
        'email' => 'min:5|max:255|unique:users,email',
        'password' => 'min:8|max:255',
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $user = User::create([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => bcrypt(trim($request->password)),
            'valid' => 1,            
            'role_id' => 2,
            'state_id' => 1,
            'last_name' => trim($request->last_name),
            'first_name' => trim($request->first_name),
            'folder' => strtoupper(substr(trim($request->name), 0, 3)),
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
        $user->state_id = $request->state_id ? $request->state_id : $user->state_id;
        $user->valid = $request->valid;
        $user->name = $request->name ? trim($request->name) : $user->name;
        $user->email = $request->email ? trim($request->email) : $user->email;
        $user->password = $request->password ? bcrypt(trim($request->password)) : $user->password;
        $user->last_name = $request->last_name ? trim($request->last_name) : $user->last_name;
        $user->first_name = $request->first_name ? trim($request->first_name) : $user->first_name;
        $user->folder = $request->folder ? trim($request->folder) : $user->folder;
        $user->save();
        return $this->crudUpdate($user);
    }

    public function Ownerupdate(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $user = User::find($id)) {
            return $this->crudUpdate(null);
        }
        $user->name = $request->name ? trim($request->name) : $user->name;
        $user->email = $request->email ? trim($request->email) : $user->email;
        $user->password = $request->password ? bcrypt(trim($request->password)) : $user->password;
        $user->last_name = $request->last_name ? trim($request->last_name) : $user->last_name;
        $user->first_name = $request->first_name ? trim($request->first_name) : $user->first_name;
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
