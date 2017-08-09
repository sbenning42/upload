<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductPeriod;

class ProductPeriodsController extends CrudController
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
        $ProductPeriod = ProductPeriod::create([
            'name' => trim($request->name),
            'valid' => $request->valid,
        ]);
        return $this->crudCreate($ProductPeriod);
    }

    public function index()
    {
        return $this->crudReadAll(ProductPeriod::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductPeriod::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductPeriod = ProductPeriod::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductPeriod->valid = $request->valid;
        $ProductPeriod->name = $request->name ? trim($request->name) : $ProductPeriod->name;
        $ProductPeriod->save();
        return $this->crudUpdate($ProductPeriod);
    }

    public function destroy($id)
    {
        if (! $ProductPeriod = ProductPeriod::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductPeriod->delete();
        return $this->crudDelete($ProductPeriod);
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
