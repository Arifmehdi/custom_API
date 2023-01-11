<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataTableController extends Controller
{
    //======================= this is laboratory for datatable ==================
    public function index()
    {
        return view('datatable.index');
    }
}
