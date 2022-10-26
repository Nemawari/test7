<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function showList() {


        return view('list_view',[
            'companies' => Company::all(),
            'products' => Product::all()
        ]);
    }
    
    // 検索　
    public function search(Request $request){
       
        $keyword = $request->input('item_name');
        // dd($keyword);
        $product = Product::where('product_name','like',"%$keyword%")->get();

        return redirect()->route('list')->with('products',$product);
    }

    // ソート機能
    public function initialize(){
        $form = Product::all()->orderBy('price','desc');
        $form = Product::paginate(3);

        return view('list_view',
        ['products' => $form]);
    }
    
    
    public function showCreate(){
        return view('create_view');
    }
    
    public function showDetail($id){
        $product=Product::find($id);
        // dd($product);
        return view('detail_view',
        [
            'product' => $product,
            'product_id' => $id,
            'img_path' => optional($product)->img_path,
            'product_name' => optional($product)->product_name,
            'company_id' => optional($product)->company_id,
            'price' => optional($product)->price,
            'stock' => optional($product)->stock,
            'comment' => optional($product)->comment
            ]
        );
    }
    
    public function showUpdate($id){
        
        return view('update_view',[
            'product' => Product::find($id),
            
        ]);
    }
    
    // 更新ボタン
    public function update(Request $update){
        $company = Company::all();
        $date = Product::find($update->id);

        if($update->has('img')){
            // $data->img_path = $update->img->store('public/img');
            Storage::put('file.jpg', $update->img);
        } 
       
    }
        
        // 削除ボタン
        public function delete($id){
            Product::where('id',$id)->delete();
            
            return redirect("/list");
    }
        
};