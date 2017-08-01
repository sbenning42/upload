<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;

class AdminRolesController extends ControllerHelper
{
    private function _validateStore($request) {
        $this->validate($request, [
            'name' => 'required|min:3|unique:roles,name',
        ]);
    }

    private function _validateUpdate($request) {
        $this->validate($request, [
            'name' => 'required|min:3|unique:roles,name',
        ]);
    }

    private function _handleIndex() {
        $this->setSuccess(Role::all(), 200);
    }

    private function _handleStore($request) {
        if (! $role = Role::create([
                'name' => trim($request->name),
            ])) {
            $this->setError([
                'error' => 'Create role error',
                'message' => 'Role cannot be create',
            ], 422);
        } else {
            $this->setSuccess([
                'message' => 'Role created successfully',
                'role' => $role,
            ], 201);
        }
    }

    private function _handleShow($id) {
        if (! $role = Role::find($id)) {
            $this->setError([
                'error' => 'Show role error',
                'message' => 'Role cannot be found',
            ], 422);
        } else {
            $this->setSuccess($role, 200);
        }
    }

    private function _handleUpdate($request, $id) {
        if (! $role = Role::find($id)) {
            $this->setError([
                'error' => 'Update role error',
                'message' => 'Role cannot be found',
            ], 422);
        } else {
            $role->name = trim($request->name);
            $role->save();
            $this->setSuccess([
                'message' => 'Role successfully updated',
                'role' => $role,
            ], 200);
        }
    }

    private function _handleDestroy($id) {
        if (! $role = Role::find($id)) {
            $this->setError([
                'error' => 'Delete role error',
                'message' => 'Role cannot be found',
            ], 422);
        } else {
            $role->delete();
            $this->setSuccess([
                'message' => 'Role successfully deleted',
            ], 200);
        }
    }

    public function index() {
        $this->_handleIndex();
        return $this->response();
    }

    public function create() { }

    public function store(Request $request) {
        $this->_validateStore($request);
        $this->_handleStore($request);
        return $this->response();
    }

    public function show($id) {
        $this->_handleShow($id);
        return $this->response();
    }

    public function edit($id) { }

    public function update(Request $request, $id) {
        $this->_validateUpdate($request);
        $this->_handleUpdate($request, $id);
        return $this->response();
    }

    public function destroy($id) {
        $this->_handleDestroy($id);
        return $this->response();
    }
}
