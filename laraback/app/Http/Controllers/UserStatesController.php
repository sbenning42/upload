<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserState;

class UserStatesController extends CrudController
{
    public $storeRules = [
        'name' => 'required|min:4|max:255|unique:user_states,name',
        'valid' => 'required',
    ];

    public $updateRules = [
        'name' => 'min:4|max:255|unique:user_states,name',
        'valid' => 'required',
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $userState = UserState::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($userState);
    }

    public function index()
    {
        return $this->crudReadAll(UserState::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(UserState::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $userState = UserState::find($id)) {
            return $this->crudUpdate(null);
        }
        $userState->valid = $request->valid;
        $userState->name = $request->name ? trim($request->name) : $userState->name;
        $userState->save();
        return $this->crudUpdate($userState);
    }

    public function destroy($id)
    {
        if (! $userState = UserState::find($id)) {
            return $this->crudDelete(null);
        }
        $userState->delete();
        return $this->crudDelete($userState);
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
