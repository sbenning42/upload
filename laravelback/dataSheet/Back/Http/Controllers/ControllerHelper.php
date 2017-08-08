<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerHelper extends Controller
{
    private $_error = false;
    private $_success_data = [];
    private $_error_data = [];
    private $_success_status = 0;
    private $_error_status = 0;

    public function setError($data, $status) {
        $this->_error = true;
        $this->_error_data = $data;
        $this->_error_status = $status;
        return $this;
    }

    public function setSuccess($data, $status) {
        $this->_error = false;
        $this->_success_data = $data;
        $this->_success_status = $status;
        return $this;
    }

    public function response() {
        if ($this->_error) {
            return response()->json($this->_error_data, $this->_error_status);
        }
        return response()->json($this->_success_data, $this->_success_status);
    }
}
