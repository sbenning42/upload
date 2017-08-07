<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductsController extends CrudController
{
    public $storeRules = [
    ];

    public $updateRules = [
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $Product = Product::create([
        ]);
        return $this->crudCreate($Product);
    }

    public function index()
    {
        return $this->crudReadAll(Product::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(Product::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $Product = Product::find($id)) {
            return $this->crudUpdate(null);
        }
        $Product->save();
        return $this->crudUpdate($Product);
    }

    public function destroy($id)
    {
        if (! $Product = Product::find($id)) {
            return $this->crudDelete(null);
        }
        $Product->delete();
        return $this->crudDelete($Product);
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
