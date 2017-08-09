<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductBrand;

class ProductBrandsController extends CrudController
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
        $ProductBrand = ProductBrand::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($ProductBrand);
    }

    public function index()
    {
        return $this->crudReadAll(ProductBrand::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductBrand::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductBrand = ProductBrand::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductBrand->valid = $request->valid;
        $ProductBrand->name = $request->name ? trim($request->name) : $ProductBrand->name;
        $ProductBrand->save();
        return $this->crudUpdate($ProductBrand);
    }

    public function destroy($id)
    {
        if (! $ProductBrand = ProductBrand::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductBrand->delete();
        return $this->crudDelete($ProductBrand);
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
