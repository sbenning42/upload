<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductStyle;

class ProductStylesController extends CrudController
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
        $ProductStyle = ProductStyle::create([
             'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($ProductStyle);
    }

    public function index()
    {
        return $this->crudReadAll(ProductStyle::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductStyle::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductStyle = ProductStyle::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductStyle->valid = $request->valid;
        $ProductStyle->name = $request->name ? trim($request->name) : $ProductStyle->name;
        $ProductStyle->save();
        return $this->crudUpdate($ProductStyle);
    }

    public function destroy($id)
    {
        if (! $ProductStyle = ProductStyle::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductStyle->delete();
        return $this->crudDelete($ProductStyle);
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
