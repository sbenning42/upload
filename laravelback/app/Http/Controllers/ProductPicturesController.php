<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductPicture;

class ProductPicturesController extends CrudController
{
    public $storeRules = [
    ];

    public $updateRules = [
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $ProductPicture = ProductPicture::create([
            'product_id' => trim($request->product_id),
            'valid' => 1,
            'public_path' => trim($request->public_path)
        ]);
        return $this->crudCreate($ProductPicture);
    }

    public function index()
    {
        return $this->crudReadAll(ProductPicture::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(ProductPicture::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $ProductPicture = ProductPicture::find($id)) {
            return $this->crudUpdate(null);
        }
        $ProductPicture->save();
        return $this->crudUpdate($ProductPicture);
    }

    public function destroy($id)
    {
        if (! $ProductPicture = ProductPicture::find($id)) {
            return $this->crudDelete(null);
        }
        $ProductPicture->delete();
        return $this->crudDelete($ProductPicture);
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
