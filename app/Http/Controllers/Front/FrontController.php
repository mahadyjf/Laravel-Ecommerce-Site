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
                                    ->limit(4)
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

        //-----Brands-----//

        $result['brands_home'] = DB::table('brands')
                                    ->where(["status"=>1])
                                    ->where(["is_home"=>1])
                                    ->get();   
                                    
        //-----is_Featured-----//                 
        $result['featured_products_home'][$list->id]=
                DB::table('products')
                ->where(['status'=>1])
                ->where(['is_featured'=>1])
                ->get();

            foreach($result['featured_products_home'][$list->id] as $list1){
                $result['featured_products_attr_home'][$list1->id]=
                        DB::table('products_attr')
                        ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                        ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                        ->where(['products_attr.products_id'=>$list1->id])
                        ->get();
                
            }

        //-----is_tranding-----//                 
        $result['tranding_products_home'][$list->id]=
        DB::table('products')
        ->where(['status'=>1])
        ->where(['is_tranding'=>1])
        ->get();

            foreach($result['tranding_products_home'][$list->id] as $list1){
                $result['tranding_products_attr_home'][$list1->id]=
                        DB::table('products_attr')
                        ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                        ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                        ->where(['products_attr.products_id'=>$list1->id])
                        ->get();
                
            }

         //-----is_discounted-----//                 
         $result['discounted_products_home'][$list->id]=
         DB::table('products')
         ->where(['status'=>1])
         ->where(['is_discounted'=>1])
         ->get();
 
             foreach($result['discounted_products_home'][$list->id] as $list1){
                 $result['discounted_products_attr_home'][$list1->id]=
                         DB::table('products_attr')
                         ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                         ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                         ->where(['products_attr.products_id'=>$list1->id])
                         ->get();
                 
             }




             
        //-----Home Banner-----//                 
        $result['home_banner']=
        DB::table('home_banners')
        ->where(['status'=>1])
        ->get();
        // echo "<pre>";
        // print_r($result); 
        // die();
        
        
        
        
        return view('front.home', $result);
    }


   

    

   
   
}
