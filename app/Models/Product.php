<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;
class Product extends Model
{
    public function getList() {
        $products = DB::table('products')->get();
        if(!empty($keyword)){
            $query = Item::query();

            $query->where('name','LIKE',"%{$keyword}%")->onWhere('detail','LIKE',"%{$keyword}%");

        }
        return $products;
    }

    public function getCompanies(){
        $company = DB::table('companies')->get();

        return $company;
    }

    
   
    
}



//