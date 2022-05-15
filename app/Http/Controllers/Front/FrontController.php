<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
  
    public function index(Request $request)
    {
        $result['categories_home'] = DB::table('categories')
                                    ->where(["status"=>1])
                                    ->where(["is_home"=>1])
                                    ->get();                          

        foreach($result['categories_home'] as $list){
            
            
            $result['categories_products_home'][$list->id]=
                DB::table('products')
                ->where(['status'=>1])
                ->where(['category_id'=>$list->id])
                ->get();

            foreach($result['categories_products_home'][$list->id] as $list1){
               $result['products_attr_home'][$list1->id]=
                        DB::table('products_attr')
                        ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                        ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                        ->where(['products_attr.products_id'=>$list1->id])
                        ->get();
                
            }
           
        
        }
        // echo "<pre>";
        // print_r($result); 
        // die();
        
        
        
        
        return view('front.home', $result);
    }


   

    

   
   
}