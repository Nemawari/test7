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
        
        return view('list_view',[
            'companies' => Company::all(),
            'products' => Product::where('product_name','like',"%$keyword%")->get()
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
            'product' => $product
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