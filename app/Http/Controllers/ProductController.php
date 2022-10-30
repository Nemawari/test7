<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function showList() {

        $test = new Product();
        $test2 = new Company();

        try{
            $products = $test->getProducts();
            $companies = $test2->getCompanies();
        }catch(\Exception $e){
            return ;
        }

        return view('list_view',[
            'companies' => $companies,
            'products' => $products
        ]);
    }
    
    // 検索　
    public function search(Request $request){
        
        $test3 = new Product();
        $keyword = $request->input('item_name');

        try{
             $product = $test3->getSearchResult($keyword);
        }catch(\Exception $e){
            return ;
        }

        return redirect()->route('list')->with('products',$product);
    }

    // ソート機能
    public function initialize(){
        try{
              $form = Product::all()->orderBy('price','desc')->paginate(3);
            }catch(\Exception $e){
                return ;
            }

        return view('list_view',
        ['products' => $form]);
    }
    
    
    public function showCreate(){
        $test10 = new Company();

        try{
            $companies = $test10->getCompanies();
        }catch(\Exception $e){
            return ;
        }

        return view('create_view',['companies' => $companies]);
    }
    

    public function showDetail($id){
        $test4 = new Product();
        
        try{
            $product = $test4->getDetail($id);
        }catch(\Exception $e){
            return ;
        }

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
        $test5 = new Product();
        $test11 = new Company();
        
        try{
            $product = $test5->getDetail($id);
            $companies = $test11->getCompanies();
        }catch(\Throwable $e){
            throw new \Exception($e->getMessage());
        }

        return view('update_view',[
            'product' => $product,
            'companies' => $companies
        ]);
    }
    
    // 更新ボタン
    public function update(Request $update){
        $test6 = new Product();

        if($update->has('img')){
            Storage::put('file.jpg', $update->img);
        } 
        return back();

        try{
            $product = $test6->getUpdate($id);
        }catch(\Exception $e){
            return ;
        }

    }
        
        // 削除ボタン
    //     public function delete($id){
    //         Product::where('id',$id)->delete();
            
    //         return redirect("/list");
    // }
        public function delete($id){
            $test7 = new Product();

            try{
                $product = $test7->getDelete($id);
            }catch(\Throwable $e){
                throw new \Exception($e->getMessage());
            }
            
            return back();
    }
        
        //登録ボタン
        public function store(Request $request){
            $test8 = new Product();
            $create = [];
            $create['product_name']=$request->input('product_name');
            $create['company_id']=$request->input('company_id');
            $create['price']=$request->input('price');
            $create['stock']=$request->input('stock');
            $create['comment']=$request->input('comment');
            $create['img_path']=$request->input('img_path');
           
                \DB::beginTransaction();

            try{
                $test8->getCreate($create);
                
                \DB::commit();
            }catch(\Throwable $e){
                throw new \Exception($e->getMessage());
                \DB::rollBack();
                
            }
            
            return redirect(route('list'));
        }
};