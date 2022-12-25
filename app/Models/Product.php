<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;
// ↓ ステップ８　ソート機能の追記
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    // ステップ８　ソート機能
    use Sortable;
    public $sortable = ['id'];

    // 登録処理
    protected $table = 'products';
    protected $fillable = ['product_name','company_id','price', 'stock','comment','img_path'];

    public function getList() {
        // $products = DB::table('products')->get();
        
        if(!empty($keyword)){
            $query = Item::query();
            
            $query->where('name','LIKE',"%{$keyword}%")->onWhere('detail','LIKE',"%{$keyword}%");
            
        }
        return $products;
    }
    
    public function getProducts(){
        // ステップ８　ソート機能
        $products = Product::sortable()->get();
        return $products;
    }

    //検索  ->whereBetween('price',[500,1000])
    public function getSearchResult($keyword2){
        $result = Product::where('product_name','like',"%$keyword2%")->get();  
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

    // ステップ８　購入処理
    public function registration(){
        // 戻り値設定
        $result = 0;
        $reduce_number = 1;

        // 在庫数からの減算処理 stock どこから？
        if($this->stock > 0){
            DB::beginTransaction();

            try{
                $this->stock -= $reduce_number;
                $this->save();
                DB::commit();
                $result = 0;
            }catch (\Exception $e){
                $result = 2;
            }
        }else{
            $result = 1;
        }

        return $result;
    }
}