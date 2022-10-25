<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;

class ProductController extends Controller
{
    public function showList() {

        // if{}
        // // searchだったらの内容 ('list_view',['companies_blade' => $companies]);

        return view('list_view',[
            'companies' => Company::all(),
            'products' => Product::all()
        ]);
    }
    
    // 検索　
    public function search(Request $request){
        $keyword = $request->input('item_name');
        $product = Product::where('product_name','like',"%$keyword%")->get();


        dd($product);
        
        return view('list_view',[
            'companies' => Company::all(),
            'product' => $product
        ]);
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
        
        // $update[
            // 'id'=>$request->id,
            // 'company'=>$request->company_name,
            // 'street_address'=>$request->street_address,
            // 'representative_name'=>$request->representative_name,
            // ]
            // return redirect("/update");
            
    }
        
        // 削除ボタン
        public function delete($id){
            Product::where('id',$id)->delete();
            
            return redirect("/list");
    }
        
};