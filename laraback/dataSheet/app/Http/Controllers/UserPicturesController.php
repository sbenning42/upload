<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserPicture;

class UserPicturesController extends CrudController
{
    public $storeRules = [
    ];

    public $updateRules = [
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $UserPicture = UserPicture::create([
        ]);
        return $this->crudCreate($UserPicture);
    }

    public function index()
    {
        return $this->crudReadAll(UserPicture::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(UserPicture::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $UserPicture = UserPicture::find($id)) {
            return $this->crudUpdate(null);
        }
        $UserPicture->save();
        return $this->crudUpdate($UserPicture);
    }

    public function destroy($id)
    {
        if (! $UserPicture = UserPicture::find($id)) {
            return $this->crudDelete(null);
        }
        $UserPicture->delete();
        return $this->crudDelete($UserPicture);
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
