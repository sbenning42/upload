<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserAddress;

class UserAddressesController extends CrudController
{
    public $storeRules = [
    ];

    public $updateRules = [
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $UserAddress = UserAddress::create([
        ]);
        return $this->crudCreate($UserAddress);
    }

    public function index()
    {
        return $this->crudReadAll(UserAddress::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(UserAddress::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $UserAddress = UserAddress::find($id)) {
            return $this->crudUpdate(null);
        }
        $UserAddress->save();
        return $this->crudUpdate($UserAddress);
    }

    public function destroy($id)
    {
        if (! $UserAddress = UserAddress::find($id)) {
            return $this->crudDelete(null);
        }
        $UserAddress->delete();
        return $this->crudDelete($UserAddress);
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
