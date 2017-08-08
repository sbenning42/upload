<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserRole;

class UserRolesController extends CrudController
{
    public $storeRules = [
        'name' => 'required|min:4|max:255|unique:user_roles,name',
        'valid' => 'required',
    ];

    public $updateRules = [
        'name' => 'min:4|max:255|unique:user_roles,name',
        'valid' => 'required',
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $userRole = UserRole::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($userRole);
    }

    public function index()
    {
        return $this->crudReadAll(UserRole::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(UserRole::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $userRole = UserRole::find($id)) {
            return $this->crudUpdate(null);
        }
        $userRole->valid = $request->valid;
        $userRole->name = $request->name ? trim($request->name) : $userRole->name;
        $userRole->save();
        return $this->crudUpdate($userRole);
    }

    public function destroy($id)
    {
        if (! $userRole = UserRole::find($id)) {
            return $this->crudDelete(null);
        }
        $userRole->delete();
        return $this->crudDelete($userRole);
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
