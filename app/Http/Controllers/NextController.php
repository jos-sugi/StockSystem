<?php

namespace App\Http\Controllers;

use Request;
use App\Stock;

class NextController extends Controller
{
    public function index()
    {
        $data =Stock::all();

        // $name = Request::input('name');
        // $number = Request::input('number');
        // $money = Request::input('money');

        // $data =[
        //     'name' => $name,
        //     'number' => $number,
        //     'money' => $money,
        // ];

        return view('next')->with('data',$data);
    }

    public function store()
    { 
        $data=[];
        $item = Request::input('item');
        $number = Request::input('number');
        $money = Request::input('money');

        $data =[
            'item' => $item,
            'number' => $number,
            'money' => $money,
        ];
        
        Stock::create($data);
        return back();
    }
    // public function store(Request $request)
    // {
    // //インスタンス作成
    // $Item = new Item();
    
    // //Inputタグのname属性がonamaeの場合 $request->onamae で値を受け取る
    // //モデルインスタンスのname属性に代入
    // $Iten->name = $request->item;
    
    // //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
    // $Item->save();
    // }
}
