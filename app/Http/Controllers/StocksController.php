<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StocksController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function makeCSV()
    {
        // $data =Stock::all();
        // return view('next')->with('data',$data);
        // データの作成
        $data = Stock::get();  // データベースのテーブルを指定
    
        // カラムの作成
        $head = ['id','商品名','個数','金額','ステータス'];

        // 書き込み用ファイルを開く
        $f = fopen('test.csv', 'w');
        if ($f) {
            // カラムの書き込み
            mb_convert_variables('SJIS', 'UTF-8', $head);
            fputcsv($f, $head);
            // データの書き込み
            //foreach ($data as $¥dt) {
            foreach ($data as $row) {  //データを1行ずつ回す
                switch ($row->status){
                    case 0:
                        $status = "発注確認";
                      break;
                    case 1:
                        $status = "発注状態";
                      break;
                    case 2:
                        $status = "発注済み";
                      break;
                    case 3:
                        $status = "発注受け取り済み";
                      break;
                    }
                $csv = [
                    $row->id,  //オブジェクトなので -> で取得
                    $row->item,
                    $row->number,
                    $row->money,
                    $status,
                ];
                mb_convert_variables('SJIS', 'UTF-8', $csv);
                fputcsv($f, $csv);
            }
            //}
        }
        // ファイルを閉じる
        fclose($f);

        // HTTPヘッダ
        header("Content-Type: application/octet-stream");
        header('Content-Length: '.filesize('test.csv'));
        header('Content-Disposition: attachment; filename=test.csv');
        readfile('test.csv');
    }
}
