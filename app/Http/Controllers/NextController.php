<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Request;
use Illuminate\Http\Request;
use App\Stock;

class NextController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|max:255',
            'number' => 'required',
            'money' => 'required',
        ]);

        $stock = new Stock;
        $stock->item = $request->item;
        $stock->number = $request->number;
        $stock->money = $request->money;
        $stock->save();

        return back();
    }
}
