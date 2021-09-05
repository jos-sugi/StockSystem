<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class DestroyController extends Controller
{
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect('/list');
    }
}
