<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $model['data'] = Category::all();
        return view('admin.category', $model);
    }

    public function manage_category(Request $request, $id=null)
    {
        if($id>0){
            $arr = Category::where('id', $id)->get();
            $result['category_name'] = $arr['0']->category_name;
            $result['category_slug'] = $arr['0']->category_slug;
            $result['id'] = $arr['0']->id;
            $result['parent_category_id'] = $arr['0']->parent_category_id;
            $result['category_img'] = $arr['0']->category_img;
            $result['is_home'] = $arr['0']->is_home;
            $result['is_home_checked'] = "";
            if($arr['0']->is_home == 1){
                $result['is_home_checked'] = "checked";
            }

            $result['category'] = DB::table('categories')->where('status', '=', 1)->where('id', '!=', $id)->get();
        }else{
            $result['category_name'] = '';
            $result['category_slug'] = '';
            $result['id'] = 0;
            $result['parent_category_id'] = '';
            $result['category_img'] = '';
            $result['is_home'] = '';
            $result['is_home_checked'] = "";

            $result['category'] = DB::table('categories')->where('status', '=', 1)->get();
        }
        return view('admin.manage_category', $result);
    }

    public function manage_category_process(Request $request){
    //    return $request->input();
    //    die();
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories,category_slug,'.$request->input('id'),
            'category_img'=>'mimes:jpg,jpeg,png'
        ]);
        if($request->input('id')>0){
            $model = Category::find($request->input('id'));
            $msg="Category Updated";
        }else{
            $model = new Category();
            $msg="Category Insert Successfull";
            $model->status = 0;
        }
        if($request->hasfile('category_img')){
            if($request->input('id')>0){
                $catImg = DB::table('categories')->where(['id'=>$request->input('id')])->get();
                if(Storage::exists("public/category/".$catImg[0]->category_img)){
                    Storage::delete("public/category/".$catImg[0]->category_img);
                }
            }
        }
        
        $model->category_name = $request->input('category_name');
        $model->category_slug = $request->input('category_slug');
        $model->parent_category_id = $request->input('parent_category_id');
        $model->is_home = 0;
        if($request->input('is_home')!= null){
            $model->is_home = 1;
        }

        if($request->hasfile('category_img')){
            
            $image = $request->file('category_img');
            $ext = $image->extension();
            $img_name =time().".".$ext;
            $image->storeAs('public/category', $img_name);
           //return $img_name;
           $model->category_img = $img_name;
        }

        
        $model->save();
        session()->flash('message', $msg);
        return redirect('admin/category');
    }

    function delete_category(Request $request, $id){
        $catImg = DB::table('categories')->where(['id'=>$id])->get();
                if(Storage::exists("public/category/".$catImg[0]->category_img)){
                    Storage::delete("public/category/".$catImg[0]->category_img);
                }
        $model = Category::find($id);
        $model->delete();
        session()->flash('message', 'Category Delete Successfull');
        return redirect('admin/category');
    }

    function status(Request $request, $status, $id){
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'Category Status Update');
        return redirect('admin/category');
    }
}
