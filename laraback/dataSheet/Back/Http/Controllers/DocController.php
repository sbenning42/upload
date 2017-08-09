<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends ControllerHelper
{
    private function _getDoc() {
        $doc = [
            'title' => 'This is a test.',
            'message' => 'Hello world!',
        ];
        return $doc;
    }

    private function _handleGetDoc($request) {
        $this->setSuccess([
            'documentation' => $this->_getDoc(),
        ], 200);
    }

    public function getDoc(Request $request) {
        $this->_handleGetDoc($request);
        return $this->response();
    }

}
