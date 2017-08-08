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
            'user_id' => trim($request->user_id),
            'name' => trim($request->name),
            'ref' => trim($request->ref),
            'valid' => 1,
            'address_id' => trim($request->address_id),
            'state_id' => 1,
            'category_id' => trim($request->category_id),
            'condition_id' => trim($request->condition_id),
            'designer_id' => trim($request->designer_id) || 1,
            'brand_id' => trim($request->brand_id) || 1,
            'material_id' => trim($request->material_id),
            'color_id' => trim($request->color_id),
            'style_id' => trim($request->style_id),
            'period_id' => trim($request->period_id),
            'description' => trim($request->description),
            'quantity' => trim($request->quantity),
            'price' => trim($request->price),
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
