<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model['data'] = Product::all();
        return view('admin.product', $model);
    }

    public function manage_product(Request $request, $id=''){
      
        
        if($id>0){
            $arr = Product::where('id', $id)->get();
            $result['id'] = $arr['0']->id;
            $result['category_id'] = $arr['0']->category_id;
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['slug'] = $arr['0']->slug;
            $result['brand_id'] = $arr['0']->brand_id;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keywords'] = $arr['0']->keywords;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['uses'] = $arr['0']->uses;
            $result['warranty'] = $arr['0']->warranty;
            $result['lead_time'] = $arr['0']->lead_time;
            $result['tax_id'] = $arr['0']->tax_id;
            $result['is_promo'] = $arr['0']->is_promo;
            $result['is_featured'] = $arr['0']->is_featured;
            $result['is_discounted'] = $arr['0']->is_discounted;
            $result['is_tranding'] = $arr['0']->is_tranding;

            $result['productAttrArr'] = DB::table('products_attr')->where(['products_id'=>$id])->get();


            $result['productimgArr'] = DB::table('products_img')->where(['products_id'=>$id])->get();
            // echo "<pre>";
            // print_r($result['productimgArr']);
            // echo "</pre>";
            // die();
            

            
        }else{
            $result['id'] = '';
            $result['category_id'] = '';
            $result['name'] = '';
            $result['image'] = '';
            $result['slug'] = '';
            $result['brand_id'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['technical_specification'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
            $result['lead_time'] = '';
            $result['tax_id'] = '';
            $result['is_promo'] = '';
            $result['is_featured'] = '';
            $result['is_discounted'] = '';
            $result['is_tranding'] = '';

            $result['productAttrArr'][0]['id']= '';
            $result['productAttrArr'][0]['products_id']= '';
            $result['productAttrArr'][0]['sku']= '';
            $result['productAttrArr'][0]['mrp']= '';
            $result['productAttrArr'][0]['price']= '';
            $result['productAttrArr'][0]['size_id']= '';
            $result['productAttrArr'][0]['color_id']= '';
            $result['productAttrArr'][0]['qty']= '';
            $result['productAttrArr'][0]['attr_image']= '';

            $result['productimgArr'][0]['id']='';
            $result['productimgArr'][0]['products_id']='';
            $result['productimgArr'][0]['image']='';


        // echo "<pre>";
        // print_r($result['productimgArr']);
        // echo "</pre>";
        // die();
            

        }

        $result['category'] = DB::table('categories')->where('status', '=', 1)->get();
        $result['brand'] = DB::table('brands')->where('status', '=', 1)->get();
        $result['size'] = DB::table('sizes')->where('status', '=', 1)->get();
        $result['tax'] = DB::table('taxs')->where('status', '=', 1)->get();
        $result['color'] = DB::table('colors')->where('status', '=', 1)->get();
        
        return view('admin.manage_product', $result);
    }
    public function manage_product_process(Request $request){
        // echo "<pre>";
        // print_r($request->post());
        // echo "</pre>";
        // die();
        if($request->hasfile('image')){
            $img_valid = "required|mimes:jpg,jpeg,png";
        }else{
            $img_valid = "";
        }
        $request->validate([
            'name'=>'required',
            'image'=>$img_valid,
            'slug'=>'required|unique:products,slug,'.$request->input('id'),
            'attr_image.*'=>'mimes:jpg,jpeg,png',
            'images.*'=>'mimes:jpg,jpeg,png'
            
        ]);

        


        if($request->hasfile('image')){
            $image = $request->file('image');
           $ext = $image->extension();
           $img_name =time().".".$ext;
           $image->storeAs('public', $img_name);
           //return $img_name;
           //$model->image = $img_name;
        }
        if($request->input('id')>0){
            $model = Product::find($request->input('id'));
        }else{
            $model = new Product();
        }

        if($request->hasfile('image')){
            if($request->input('id')>0){
                $attrImage = DB::table('products')->where(['id'=>$request->input('id')])->get();
                if(Storage::exists("public/".$attrImage[0]->image)){
                    Storage::delete("public/".$attrImage[0]->image);
                }
            }
        }
        
        $model->category_id = $request->post('category');
        $model->name = $request->post('name');
        if($request->hasfile('image')){
        $model->image=$img_name;
        }
        $model->slug = $request->post('slug');
        $model->brand_id = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->desc = $request->post('desc');
        $model->keywords = $request->post('keywords');
        $model->technical_specification = $request->post('technical_specification');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');
        $model->lead_time = $request->post('lead_time');
        $model->tax_id = $request->post('tax_id');
        $model->is_promo = $request->post('is_promo');
        $model->is_featured = $request->post('is_featured');
        $model->is_discounted = $request->post('is_discounted');
        $model->is_tranding = $request->post('is_tranding');
        $model->status = 1;
        $model->save();
        $pid = $model->id;

        /**Product Attr Start */
        $pidArr=$request->post('pid');
        $skuArr=$request->post('sku');
        $mrpArr=$request->post('mrp');
        $priceArr=$request->post('price');
        $sizeArr=$request->post('size');
        $colorArr=$request->post('color');
        $qtyArr=$request->post('qty');
        
        foreach($skuArr as $key => $val){
            $productAttrArr =[];
            //sku vlidation
            // $skuCheck = DB::table('products_attr')
            // ->where('sku', '=', $skuArr[$key])
            // ->get();
            //sku vlidation
            $productAttrArr['products_id'] = $pid;
            // if(isset($skuArr[0])){
            //     $request->session()->flash('sku_error', $skuArr[$key].' SKU Already Exist');
            //     return redirect(request()->headers->get('referer'));
            // }else{
            //     $productAttrArr['sku'] = $val;
            // }
            $productAttrArr['sku'] = $val;
            $productAttrArr['mrp'] = (int)$mrpArr[$key];
            $productAttrArr['price'] = (int)$priceArr[$key];
            if($sizeArr == ""){
                $productAttrArr['size_id'] = 0;
            }else{
                $productAttrArr['size_id'] = $sizeArr[$key];
            }
            if($colorArr == ""){
                $productAttrArr['color_id'] = 0;
            }else{
                $productAttrArr['color_id'] = $colorArr[$key];
            }
            
            
            $productAttrArr['qty'] = (int)$qtyArr[$key];

            
            if($request->hasfile("attr_image.$key")){

                if($pidArr[$key]!= ''){
                $attrImage = DB::table('products_attr')->where(['id'=>$pidArr[$key]])->get();
                    if(Storage::exists("public/".$attrImage[0]->attr_image)){
                        Storage::delete("public/".$attrImage[0]->attr_image);
                    }
            }

                $rend = rand('111111111', '999999999');
                $attr_image = $request->file("attr_image.$key");
                $attr_img_ext = $attr_image->extension();
                $attr_img_name =$rend.".".$attr_img_ext;
                $request->file("attr_image.$key")->storeAs('public', $attr_img_name);
               //return $img_name;
               //$model->image = $img_name;
               $productAttrArr['attr_image'] = $attr_img_name;
            }
           
            
            if($pidArr[$key]!= ''){
                DB::table('products_attr')->where(['id'=>$pidArr[$key]])->update($productAttrArr);
            }else{
                DB::table('products_attr')->insert($productAttrArr);
            }
            

        }
        /**Product Attr End */


        /**Product Images start */
        $pidimgArr=$request->post('piid');
        foreach($pidimgArr as $key => $val){
            $productImgArr['products_id'] = $pid;
            if($request->hasfile("images.$key")){

                if($pidimgArr[$key]!= ''){
                    $attrImage = DB::table('products_img')->where(['id'=>$pidimgArr[$key]])->get();
                        if(Storage::exists("public/".$attrImage[0]->image)){
                        Storage::delete("public/".$attrImage[0]->image);
                    }
                }
                $rend = rand('111111111', '999999999');
                $product_image = $request->file("images.$key");
                $product_img_ext = $product_image->extension();
                $product_img_name =$rend.".".$product_img_ext;
                $request->file("images.$key")->storeAs('public', $product_img_name);
               //return $img_name;
               //$model->image = $img_name;
               $productImgArr['image'] = $product_img_name;
            }
            if($pidimgArr[$key]!= ''){
                DB::table('products_img')->where(['id'=>$pidimgArr[$key]])->update($productImgArr);
            }else{
                DB::table('products_img')->insert($productImgArr);
            }

        }
        /**Product Images start */
        session()->flash('message', "Product Inserted");
        return redirect('admin/product');
    }

    public function delete_product($id){
        //return $id;
        $model = Product::find($id);
        $model->delete();
        session()->flash('message', 'Product Delete Successfull');
        return redirect('admin/product');
    }

    public function product_attr_delete($paid, $pid){
        $attrImage = DB::table('products_attr')->where(['id'=>$paid])->get();
        if(Storage::exists("public/".$attrImage[0]->attr_image)){
            Storage::delete("public/".$attrImage[0]->attr_image);
        }
        DB::table('products_attr')->where(['id'=>$paid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

    public function product_images_delete($piid, $pid){
        $attrImage = DB::table('products_img')->where(['id'=>$piid])->get();
        if(Storage::exists("public/".$attrImage[0]->image)){
            Storage::delete("public/".$attrImage[0]->image);
        }
        
        DB::table('products_img')->where(['id'=>$piid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }


    

    function status(Request $request, $status, $id){
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'Product Status Update');
        return redirect('admin/product');
    }

    
}
