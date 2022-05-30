<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Mail;

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

    function products(Request $request, $slug){

        $short="";
        $short_text='';
        $short_price_start='';
        $short_price_end='';
        $arrcolorfilter=[];
        $filter_color='';

        if($request->get('short') !== null){
            $short = $request->get('short');
        }

        $query = DB::table('products');
        $query = $query->leftJoin('categories', 'categories.id','=','products.category_id');
        $query = $query->leftJoin('products_attr', 'products_attr.products_id','=','products.id');
        $query = $query->where(['products.status'=>1]);
        $query = $query->where(['categories.category_slug'=>$slug]);
        if($short=='name'){
            $query = $query->orderBy('products.name', 'asc');
            $short_text = "Product Name";
        }
        if($short=='date'){
            $query = $query->orderBy('products.id', 'desc');
            $short_text = "Date";
        }
        if($short=='price_asc'){
            $query = $query->orderBy('products_attr.price', 'asc');
            $short_text = "Price ASC";
        }
        if($short=='price_desc'){
            $query = $query->orderBy('products_attr.price', 'desc');
            $short_text = "Price DESC";
        }
        if($request->get('short_price_start') !== null && $request->get('short_price_end') !== null){
            $short_price_start = $request->get('short_price_start');
            $short_price_end = $request->get('short_price_end');
            if($short_price_start>0 && $short_price_end>0){
                $query = $query->whereBetween('products_attr.price', [$short_price_start, $short_price_end]);
            }
        }
        if($request->get('filter_color') !== null){
            $filter_color = $request->get('filter_color');
            $arrcolorfilter = explode(':', $filter_color);
            $arrcolorfilter = array_filter($arrcolorfilter);
            
            $query = $query->where(['products_attr.color_id'=> $filter_color]);
           
        }
        $query = $query->distinct()->select('products.*');
        $query = $query->get();

        
        $result['products']=$query;

            foreach($result['products'] as $list1){
                $result['products_attr'][$list1->id]=
                        DB::table('products_attr')
                        ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                        ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                        ->where(['products_attr.products_id'=>$list1->id])
                        ->get();
                
            }


            $result['color']=
            DB::table('colors')
            ->where(['status'=>1])
            ->get();

            $result['categories']=
            DB::table('categories')
            ->where(['status'=>1])
            ->get();
            // prx($result['color']);
            $result['short_text']=$short_text;
            $result['short']=$short;
            $result['short_price_start']=$short_price_start;
            $result['short_price_end']=$short_price_end;
            $result['filter_color']=$filter_color;
            $result['arrcolorfilter']=$arrcolorfilter;
            $result['slug']=$slug;
           
            
            
        return view('front.products', $result);
    }


  public function search(Request $request, $str)
    {
        $result['search']=
         DB::table('products')
         ->where(['status'=>1])
         ->where('name', 'like', "%$str%")
         ->orwhere('model', 'like', "%$str%")
         ->orwhere('short_desc', 'like', "%$str%")
         ->orwhere('desc', 'like', "%$str%")
         ->orwhere('keywords', 'like', "%$str%")
         ->distinct()->select('products.*')
         ->get();
 
             foreach($result['search'] as $list1){
                 $result['search_attr'][$list1->id]=
                         DB::table('products_attr')
                         ->leftJoin('sizes', 'sizes.id','=','products_attr.size_id')
                         ->leftJoin('colors', 'colors.id','=','products_attr.color_id')
                         ->where(['products_attr.products_id'=>$list1->id])
                         ->get();
                 
             }
            //  prx($result);
             return view('front.search', $result);
    }

    public function registration(Request $request)
    {
       
        return view('front.registration');
    }
    public function registration_prosses(Request $request)
    {
       $valid=Validator::make($request->all(),[
            "name"=>'required',
            "email"=>'required|email|unique:customers,email',
            "mobile"=>'required|min:8|max:15',
            "password"=>'required'
            
       ]);
       if(!$valid->passes()){
           return response()->json(['status'=>'error', 'error'=>$valid->errors()->toArray()]);
       }else{
        $rand = rand(111111111, 999999999);
           $arr=[
               "name"=>$request->name,
               "email"=>$request->email,
               "mobile"=>$request->mobile,
               "password"=>Crypt::encrypt($request->password),
               "status"=>1,
               "is_verify"=>0,
               "rand_id"=>$rand,
               "created_at"=>date('Y-m-d h:i:s'),
               "updated_at"=>date('Y-m-d h:i:s')
           ];

           $query = DB::table('customers')->insert($arr);
           if($query){
               $data=['name'=>$request->name, 'rand'=>$rand];
               $user['to']=$request->email;
               Mail::send('front/email_verification', $data, function ($message) use ($user){
                   
                   $message->to($user['to']);
                   $message->subject('Email ID verification');
               });

               return response()->json(['status'=>'success', 'msg'=>'Registration Successfully. Please check your email id for verification']);
           }
       }
    }


    public function login_prosses(Request $request){
        
        $result = DB::table('customers')
            ->where(['email'=>$request->login_email])
            ->get();
       if(isset($result[0])){
           $db_pwd  = Crypt::decrypt($result[0]->password);
           $is_verify = $result[0]->is_verify;
           $status = $result[0]->status;
           if($is_verify == 0){
            return response()->json(['status'=>'error', 'msg'=>'Please Verify your email Id']);
           }
           if($status == 0){
            return response()->json(['status'=>'error', 'msg'=>'Your Acount Has Been Deactivet']);
           }
            if($db_pwd == $request->login_password){
                if($request->rememberme===null){
                    setcookie('login_email', $request->login_email, 100);
                    setcookie('login_pwd', $request->login_password, 100);
                }else{
                    setcookie('login_email', $request->login_email, time()+60*60*24*100);
                    setcookie('login_pwd', $request->login_password, time()+60*60*24*100);
                }
                $request->session()->put('FORNT_USER_LOGIN', true);
                $request->session()->put('FORNT_USER_ID', $result[0]->id);
                $request->session()->put('FORNT_USER_NAME', $result[0]->name);
                $status="success";
                $msg = "";
               
            }else{
                $status="error";
                $msg = "Please Enter Valid Password";
            }
       }else{
           $status="error";
           $msg = "Please Enter Valid Email";
       }
       return response()->json(['status'=>$status, 'msg'=>$msg]);
    }


    public function verification(Request $request, $id)
    {
        $result = DB::table('customers')
        ->where(['rand_id'=>$id])
        ->get();
        
        if(isset($result[0])){
            $name['name'] = $result[0]->name;
            DB::table('customers')
            ->where(['id'=>$result[0]->id])
            ->update(['is_verify'=>1, 'rand_id'=>'']);
            return view('front.front_user_welcome', $name);
        }else{
            return redirect('/');
        }
    }
   
   
}
