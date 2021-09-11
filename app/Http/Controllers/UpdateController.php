<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class UpdateController extends Controller
{
    public function update($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->status = 1;
        $stock->save();


        return redirect('/list');
    }
}
