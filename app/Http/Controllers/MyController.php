<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\DataExport;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new DataExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new DataImport,request()->file('file'));
        return back();
    }
}
