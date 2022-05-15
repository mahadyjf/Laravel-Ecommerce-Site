<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BrandController extends Controller
{
    public function index()
    {
        $model['data'] = Brand::all();
        return view('admin.brand', $model);
    }

    public function manage_brand(Request $request, $id=null)
    {
        if($id>0){
            $arr = Brand::where('id', $id)->get();
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['id'] = $arr['0']->id;
            $result['is_home'] = $arr['0']->is_home;
            $result['is_home_checked'] = "";
            if($arr['0']->is_home == 1){
                $result['is_home_checked'] = "checked";
            }
        }else{
            $result['name'] = '';
            $result['image'] = '';
            $result['id'] = 0;
            $result['is_home'] = '';
            $result['is_home_checked'] = "";
        }
        return view('admin.manage_brand', $result);
    }

    public function manage_brand_process(Request $request){
       //return $request->input('id');
        $request->validate([
            'name' => 'required|unique:brands,name,'.$request->input('id'),
            'image'=>'mimes:jpg,jpeg,png'
        ]);

        


        if($request->input('id')>0){
            $model = Brand::find($request->input('id'));
            $msg="Brand Updated";
        }else{
            $model = new Brand();
            $msg="Brand Insert Successfull";
        }

        if($request->hasfile('image')){
            if($request->input('id')>0){
                $BrandImg = DB::table('brands')->where(['id'=>$request->input('id')])->get();
                if(Storage::exists("public/brand/".$BrandImg[0]->image)){
                    Storage::delete("public/brand/".$BrandImg[0]->image);
                }
            }
        }

        
        
        $model->name = $request->input('name');
        $model->is_home = 0;
        if($request->input('is_home')!= null){
            $model->is_home = 1;
        }
        if($request->hasfile('image')){
            $image = $request->file('image');
           $ext = $image->extension();
           $img_name =time().".".$ext;
           $image->storeAs('public/brand', $img_name);
           //return $img_name;
           $model->image = $img_name;
        }
        $model->status = 1;
        $model->save();
        session()->flash('message', $msg);
        return redirect('admin/brand');
    }

    function delete_brand(Request $request, $id){
            $BrandImg = DB::table('brands')->where(['id'=>$id])->get();
                if(Storage::exists("public/brand/".$BrandImg[0]->image)){
                    Storage::delete("public/brand/".$BrandImg[0]->image);
                }
        $model = Brand::find($id);
        $model->delete();
        session()->flash('message', 'brand Delete Successfull');
        return redirect('admin/brand');
    }

    function status(Request $request, $status, $id){
        $model = Brand::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'brand Status Update');
        return redirect('admin/brand');
    }
}
