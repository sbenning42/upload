<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductState;

class ProductStatesController extends CrudController
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
        $ProductState = ProductState::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($ProductState);
    }

    public function index()
    {
        return $this->crudReadAll(ProductState::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductState::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductState = ProductState::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductState->valid = $request->valid;
        $ProductState->name = $request->name ? trim($request->name) : $ProductState->name;
        $ProductState->save();
        return $this->crudUpdate($ProductState);
    }

    public function destroy($id)
    {
        if (! $ProductState = ProductState::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductState->delete();
        return $this->crudDelete($ProductState);
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
