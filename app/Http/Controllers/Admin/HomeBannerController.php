<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeBanner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class HomeBannerController extends Controller
{
   
    public function index()
    {
        $model['data'] = HomeBanner::all();
        return view('admin.home_banner', $model);
    }

    public function manage_home_banner(Request $request, $id=null)
    {
        if($id>0){
            $arr = HomeBanner::where('id', $id)->get();
            $result['image'] = $arr['0']->image;
            $result['btn_text'] = $arr['0']->btn_text;
            $result['btn_link'] = $arr['0']->btn_link;
            $result['id'] = $arr['0']->id;
            
            
        }else{
            $result['image'] = '';
            $result['btn_text'] = '';
            $result['id'] = 0;
            $result['btn_link'] = '';
        }
        return view('admin.manage_home_banner', $result);
    }

    public function manage_home_banner_process(Request $request){
    //    return $request->input();
    //    die();
        $request->validate([
            'image'=>'required|mimes:jpg,jpeg,png'
        ]);
        if($request->input('id')>0){
            $model = HomeBanner::find($request->input('id'));
            $msg="Home Banner Updated";
        }else{
            $model = new HomeBanner();
            $msg="Home Banner Insert Successfull";
            $model->status = 0;
        }
        if($request->hasfile('image')){
            if($request->input('id')>0){
                $image = DB::table('home_banners')->where(['id'=>$request->input('id')])->get();
                if(Storage::exists("public/home_banner/".$image[0]->image)){
                    Storage::delete("public/home_banner/".$image[0]->image);
                }
            }
        }

        if($request->hasfile('image')){
            
            $image = $request->file('image');
            $ext = $image->extension();
            $img_name =time().".".$ext;
            $image->storeAs('public/home_banner', $img_name);
           //return $img_name;
           $model->image = $img_name;
        }
        
        $model->btn_text = $request->input('btn_text');
        $model->btn_link = $request->input('btn_link');
        $model->status = 0;
        
        $model->save();
        session()->flash('message', $msg);
        return redirect('admin/home_banner');
    }

    function delete_home_banner(Request $request, $id){
        $image = DB::table('home_banners')->where(['id'=>$id])->get();
                if(Storage::exists("public/home_banner/".$image[0]->image)){
                    Storage::delete("public/home_banner/".$image[0]->image);
                }
        $model = HomeBanner::find($id);
        $model->delete();
        session()->flash('message', 'Home Banner Delete Successfull');
        return redirect('admin/home_banner');
    }

    function status(Request $request, $status, $id){
        $model = HomeBanner::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'Home Banner Status Update');
        return redirect('admin/home_banner');
    }
    
}
