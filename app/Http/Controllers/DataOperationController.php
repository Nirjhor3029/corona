<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataOperationController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dataDistribution()
    {
        return "ok";
    }
}
