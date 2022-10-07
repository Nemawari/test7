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
        return view('detail_view',[
            $id => 'product_id',
            $img => 'img_path' ,
            $name => 'product_name',
            $company => 'company_id',
            $price => 'price',
            $stock => 'stock',
            $comment => 'comment',

        ]);
    }

    public function showUpdate($id){
        return view('update_view');
    } 


    public function register(Request $request){
        // 処理の内容
        return [
            'user_name' => 'required',
            'email' => 'required',
            'user_password' => [
                'required',
                'min:8',
                'max:16'
            ],

            'confirm_password' => [
                'required',
                'same:user_password'
            ],
        ];

    }

    public function update(Request $update){
        // 処理の内容
    }
};