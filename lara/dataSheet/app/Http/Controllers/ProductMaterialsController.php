<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductMaterial;

class ProductMaterialsController extends CrudController
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
        $ProductMaterial = ProductMaterial::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($ProductMaterial);
    }

    public function index()
    {
        return $this->crudReadAll(ProductMaterial::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductMaterial::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductMaterial = ProductMaterial::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductMaterial->valid = $request->valid;
        $ProductMaterial->name = $request->name ? trim($request->name) : $ProductMaterial->name;
        $ProductMaterial->save();
        return $this->crudUpdate($ProductMaterial);
    }

    public function destroy($id)
    {
        if (! $ProductMaterial = ProductMaterial::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductMaterial->delete();
        return $this->crudDelete($ProductMaterial);
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
