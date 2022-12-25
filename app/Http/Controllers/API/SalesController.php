<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function sales_at(){
    // 戻り値
        $result = 0;
        $error_message = "";
        $requestId = $id;

    // 在庫減算
    $product = Product::find($id);
    // Productモデルに処理を
    $result = $product->stock();
    $error_message = "購入完了";

    // 減算完了後、売上データ作成 $resultの初期値は０になっているので、ここから上がり下がりの処理かく
    if($result === 0){
        $sale = new Sale();
        $result = $sale->registration($id);

        if($result === 1){
            $error_message = "失敗：売上作成できませんでした";
        }
    }elseif($result === 1){
        $error_message = "失敗：在庫なし";
    }else{
        $error_message = "例外発生";
    }

    return compact('result','error_message','requestId','product');
    }
}
