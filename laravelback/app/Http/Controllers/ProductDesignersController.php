<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductDesigner;

class ProductDesignersController extends CrudController
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
        $ProductDesigner = ProductDesigner::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
            'surname' => $request->surname,
        ]);
        return $this->crudCreate($ProductDesigner);
    }

    public function index()
    {
        return $this->crudReadAll(ProductDesigner::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductDesigner::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductDesigner = ProductDesigner::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductDesigner->valid = $request->valid;
        $ProductDesigner->name = $request->name ? trim($request->name) : $ProductDesigner->name;
        $ProductDesigner->save();
        return $this->crudUpdate($ProductDesigner);
    }

    public function destroy($id)
    {
        if (! $ProductDesigner = ProductDesigner::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductDesigner->delete();
        return $this->crudDelete($ProductDesigner);
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
