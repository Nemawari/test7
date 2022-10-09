<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showList() {


        // if{}
        // // searchだったらの内容

        return view('list_view',['products' => Product::all()]);
    }
    
    // public function search(){
    //     return view
    // }
    
    //
    public function showCreate(){
        return view('create_view');
    }

    public function showDetail($id){
        $product=Product::find($id);
        return view('detail_view',[
            'product_id' => $id, 
            'img_path' => $product->img_path,
            'product_name' => $product->product_name, 
            'company_id' => $product->company_id, 
            'price' => $product->price,
            'stock' => $product->stock,
            'comment'  => $product->comment,

        ]);
    }

    public function showUpdate($id){
        return view('update_view');
    } 


    public function register(Request $request){
        // 処理の内容
        // return [
        //     'user_name' => 'required',
        //     'email' => 'required',
        //     'user_password' => [
        //         'required',
        //         'min:8',
        //         'max:16'
        //     ],

        //     'confirm_password' => [
        //         'required',
        //         'same:user_password'
        //     ],
        // ];

    }

    public function update(Request $update){
        // 処理の内容
    }
};