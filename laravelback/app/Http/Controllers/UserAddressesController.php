<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserAddress;

class UserAddressesController extends CrudController
{
    public $storeRules = [
        'user_id' => 'required|exists:users,id',
        'valid' => 'required',
        'type' => 'required',
        'name' => 'required',
        'street_1' => 'required',
        'street_2' => '',
        'complement' => '',
        'floor' => '',
        'elevator' => '',
        'phone_1' => '',
        'phone_2' => '',
        'postcode' => 'required',
        'city' => 'required',
        'country_id' => 'required',
        'longitude' => '',
        'latitude' => '',
    ];
    
    public $updateRules = [
        'user_id' => 'exists:users,id',
        'valid' => '',
        'type' => '',
        'name' => '',
        'street_1' => '',
        'street_2' => '',
        'complement' => '',
        'floor' => '',
        'elevator' => '',
        'phone_1' => '',
        'phone_2' => '',
        'postcode' => '',
        'city' => '',
        'country_id' => '',
        'longitude' => '',
        'latitude' => '',
    ];

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);
        $UserAddress = UserAddress::create([
            'user_id'       =>  trim($request->user_id),
            'state_id'      =>  trim($request->state_id),
            'valid'         =>  $request->valid,
            'type'          =>  trim($request->type),
            'name'          =>  trim($request->name),
            'street_1'      =>  trim($request->street_1),
            'street_2'      =>  trim($request->street_2),
            'complement'    =>  trim($request->complement),
            //'floor'         =>  trim($request->floor),
            //'elevator'      =>  trim($request->elevator),
            'phone_1'       =>  trim($request->phone_1),
            'phone_2'       =>  trim($request->phone_2),
            'postcode'      =>  trim($request->postcode),
            'city'          =>  trim($request->city),
            'country_id'    =>  trim($request->country_id),
            'longitude'     =>  trim($request->longitude),
            'latitude'      =>  trim($request->latitude),
        ]);
        return $this->crudCreate($UserAddress);
    }

    public function index()
    {
        return $this->crudReadAll(UserAddress::all());
    }

    public function show($id)
    {
        return $this->crudReadOne(UserAddress::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules);
        if (! $UserAddress = UserAddress::find($id)) {
            return $this->crudUpdate(null);
        }
        $UserAddress->user_id      =   trim($request->user_id);
        $UserAddress->state_id      =   trim($request->state_id);
        $UserAddress->valid        =   $request->valid;
        $UserAddress->type         =   trim($request->type);
        $UserAddress->name         =   trim($request->name);
        $UserAddress->street_1     =   trim($request->street_1);
        $UserAddress->street_2     =   trim($request->street_2);
        $UserAddress->complement   =   trim($request->complement);
        //$UserAddress->floor        =   trim($request->floor);
        //$UserAddress->elevator     =   trim($request->elevator);
        $UserAddress->phone_1      =   trim($request->phone_1);
        $UserAddress->phone_2      =   trim($request->phone_2);
        $UserAddress->postcode     =   trim($request->postcode);
        $UserAddress->city         =   trim($request->city);
        $UserAddress->country_id   =   trim($request->country_id);
        $UserAddress->longitude    =   trim($request->longitude);
        $UserAddress->latitude     =   trim($request->latitude);
        $UserAddress->save();
        return $this->crudUpdate($UserAddress);
    }

    public function destroy($id)
    {
        if (! $UserAddress = UserAddress::find($id)) {
            return $this->crudDelete(null);
        }
        $UserAddress->delete();
        return $this->crudDelete($UserAddress);
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
