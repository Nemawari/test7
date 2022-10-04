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
        return view('detail_view',['product_id' => $id]);
    }

    public function showUpdate($id){
        return view('update_view');
    } 


    public function register(Request $request){
        // 処理の内容
    }

    public function update(Request $update){
        // 処理の内容
    }
};