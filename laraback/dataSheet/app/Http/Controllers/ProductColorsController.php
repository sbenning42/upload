<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductColor;

class ProductColorsController extends CrudController
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
        $ProductColor = ProductColor::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($ProductColor);
    }

    public function index()
    {
        return $this->crudReadAll(ProductColor::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductColor::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductColor = ProductColor::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductColor->valid = $request->valid;
        $ProductColor->name = $request->name ? trim($request->name) : $ProductColor->name;
        $ProductColor->save();
        return $this->crudUpdate($ProductColor);
    }

    public function destroy($id)
    {
        if (! $ProductColor = ProductColor::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductColor->delete();
        return $this->crudDelete($ProductColor);
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
