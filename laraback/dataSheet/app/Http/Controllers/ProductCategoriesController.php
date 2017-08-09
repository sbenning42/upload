<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductCategory;

class ProductCategoriesController extends CrudController
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
        $ProductCategory = ProductCategory::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($ProductCategory);
    }

    public function index()
    {
        return $this->crudReadAll(ProductCategory::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductCategory::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductCategory = ProductCategory::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductCategory->valid = $request->valid;
        $ProductCategory->name = $request->name ? trim($request->name) : $ProductCategory->name;
        $ProductCategory->save();
        return $this->crudUpdate($ProductCategory);
    }

    public function destroy($id)
    {
        if (! $ProductCategory = ProductCategory::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductCategory->delete();
        return $this->crudDelete($ProductCategory);
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
