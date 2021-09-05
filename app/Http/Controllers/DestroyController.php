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

        return redirect('/');
        #greetingsテーブルのレコードを全件取得
        // $data = Stock::all();
        // return view('all')->with('message', '削除しました。')->with('data',$data);
    }
}
