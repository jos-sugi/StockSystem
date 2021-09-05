<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class ListController extends Controller
{
    public function index()
    {
        $data =Stock::all();
        return view('next')->with('data',$data);
    }
}
