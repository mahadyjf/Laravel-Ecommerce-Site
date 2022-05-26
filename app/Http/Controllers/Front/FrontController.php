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


    public function product_detail(Request $request, $slug)
    {
        $result['product_detail']=
         DB::table('products')
         ->where(['status'=>1])
         ->where(['slug'=>$slug])
         ->get();
 
             foreach($result['product_detail'] as $list1){
                 $result['product_detail_attr'][$list1->id]=
                         DB::table('products_attr')
                         ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                         ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                         ->where(['products_attr.products_id'=>$list1->id])
                         ->get();
                 
             }

             foreach($result['product_detail'] as $list1){
                $result['product_image'][$list1->id]=
                        DB::table('products_img')
                        ->where(['products_img.products_id'=>$list1->id])
                        ->get();
                
            }


        $result['related_product']=
         DB::table('products')
         ->where(['status'=>1])
         ->where('slug', '!=', $result['product_detail'][0]->slug)
         ->where(['category_id'=>$result['product_detail'][0]->category_id])
         ->get();
 
             foreach($result['related_product'] as $list1){
                 $result['related_product_attr'][$list1->id]=
                         DB::table('products_attr')
                         ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                         ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                         ->where(['products_attr.products_id'=>$list1->id])
                         ->get();
                 
             }
            //  prx($result);
        return view("front.product-detail", $result);
        
    }

    function add_to_cart(Request $request){
       if($request->session()->has('FRONT_USER_LOGIN')){
            $uid = $request->session()->get('FRONT_USER_LOGIN');
            $utype="Reg";
       }else{
        $uid = getUserTempId();
        $utype="Not-Reg";
       }
      
      
      $qty = $request->post('pqty');
      $product_id = $request->post('product_id');
      $color_id = $request->post('color_id');
      $size_id = $request->post('size_id');


      $result= DB::table('products_attr')
            ->select('products_attr.id')
            ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
            ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
            ->where(['products_id'=>$product_id])
            ->where(['sizes.size'=>$size_id])
            ->where(['colors.color'=>$color_id])
            ->get();
    $product_attr_id = $result[0]->id;

    $check=DB::table('cart')
       ->where(['user_id'=>$uid])
       ->where(['user_type'=>$utype])
       ->where(['product_id'=>$product_id])
       ->where(['product_attr_id'=>$product_attr_id])
       ->get();

        if(isset($check[0])){
            $upeate_id=$check[0]->id;
            if($qty == 0){
                DB::table('cart')
                ->where(['id'=>$upeate_id])
                ->delete();
            $msg="Deleted";
            }else{
                DB::table('cart')
                ->where(['id'=>$upeate_id])
                ->update(['qty'=>$qty]);
                $msg="Updated";
            }
            
        }else{
            $id = DB::table('cart')->insertGetId([
                'user_id'=>$uid,
                'user_type'=>$utype,
                'qty'=>$qty,
                'product_id'=>$product_id,
                'product_attr_id'=>$product_attr_id,
                'added_on'=>date('Y-m-d h:i:s')
            ]);
            $msg="added";
        }
        $data=DB::table('cart')
        ->leftJoin('products', 'products.id','=','cart.product_id')
        ->leftJoin('products_attr', 'products_attr.id','=','cart.product_attr_id')
        ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
         ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
         ->where(['user_id'=>$uid])
         ->where(['user_type'=>$utype])
         ->select('cart.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'products.slug', 'products_attr.price', 'products_attr.id as attr_id', 'products.id as pid')
         ->get();

        return response()->json(['msg'=>$msg, 'data'=>$data, 'totalItem'=>count($data)]);
    }


   function cart(Request $request){
    if($request->session()->has('FRONT_USER_LOGIN')){
        $uid = $request->session()->get('FRONT_USER_LOGIN');
        $utype="Reg";
    }else{
        $uid = getUserTempId();
        $utype="Not-Reg";
    }
       $result['list']=DB::table('cart')
       ->leftJoin('products', 'products.id','=','cart.product_id')
       ->leftJoin('products_attr', 'products_attr.id','=','cart.product_attr_id')
       ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
        ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$utype])
        ->select('cart.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'products.slug', 'products_attr.price', 'products_attr.id as attr_id', 'products.id as pid')
        ->get();
        // prx($result);
       return view('front.cart', $result);
   }

    

   
   
}
