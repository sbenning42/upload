<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrudController extends Controller
{

    /*
    Basics
    */
    public function crudResponse($json, $status) {
        return response()->json($json, $status);
    }

    public function crudNotImplemented() {
        return $this->crudResponse(['error' => 'Not implemented yet'], 400);
    }


    /*
    Helpers
    */

    public function crudCreate($item) {
        if (! $item) {
            return $this->crudResponse(['create' => false, 'errors' => 'Can\'t create item'], 422);
        }
        return $this->crudResponse($item, 201);
    }

    public function crudReadAll($collection) {
        if (! $collection) {
            return $this->crudResponse(['read' => false, 'errors' => 'Collection not found'], 404);
        }
        return $this->crudResponse($collection, 200);
    }

    public function crudReadOne($item) {
        if (! $item) {
            return $this->crudResponse(['read' => false, 'errors' => 'Item not found'], 404);
        }
        return $this->crudResponse($item, 200);
    }

    public function crudUpdate($item) {
        if (! $item) {
            return $this->crudResponse(['update' => false, 'error' => 'Item not found'], 404);
        }
        return $this->crudResponse($item, 200);
    }

    public function crudDelete($item) {
        if (! $item) {
            return $this->crudResponse(['delete' => false, 'error' => 'Item not found'], 404);
        }
        return $this->crudResponse(['delete' => true], 200);
    }

}
