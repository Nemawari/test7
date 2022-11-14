<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;
class Product extends Model
{
    // 登録処理
    protected $table = 'products';
    protected $fillable = ['product_name','company_id','price', 'stock','comment','img_path'];

    public function getList() {
        $products = DB::table('products')->get();
        if(!empty($keyword)){
            $query = Item::query();

            $query->where('name','LIKE',"%{$keyword}%")->onWhere('detail','LIKE',"%{$keyword}%");

        }
        return $products;
    }

    public function getProducts(){
        $products = Product::all();

        return $products;
    }

    //検索
    public function getSearchResult($keyword2){
        $result = Product::where('product_name','like',"%$keyword2%")->whereBetween('price',[500,1000])->get();
        return $result;
    }

   //詳細
    public function getDetail($id2){
        $product = Product::find($id2);

        return $product;
    }

    //更新ボタン
    public function getUpdate(){
        $company = Company::all();
        $date = Product::find($update->id);

        return $company;
    }

    //削除ボタン
    public function getDelete($id){
        $delete = Product::where('id',$id)->delete();

    }

    //登録ボタン
    public function getCreate($create2){
        Product::insert([
            'product_name' => $create2['product_name'],
            'company_id' => $create2['company_id'],
            'price' => $create2['price'],
            'stock' => $create2['stock'],
            'comment' => $create2['comment'],
            'img_path' => $create2['img_path'],
        ]);
    }

}