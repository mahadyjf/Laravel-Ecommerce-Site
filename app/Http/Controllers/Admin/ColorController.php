<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $model['data'] = Color::all();
        return view('admin.color', $model);
    }

    public function manage_color(Request $request, $id=null)
    {
        if($id>0){
            $arr = Color::where('id', $id)->get();
            $result['color'] = $arr['0']->color;
            $result['id'] = $arr['0']->id;
        }else{
            $result['color'] = '';
            $result['id'] = 0;
        }
        return view('admin.manage_color', $result);
    }

    public function manage_color_process(Request $request){
       //return $request->input('id');
        $request->validate([
            
            'color' => 'required|unique:colors',
        ]);
        if($request->input('id')>0){
            $model = Color::find($request->input('id'));
            $msg="Color Updated";
        }else{
            $model = new Color();
            $msg="Color Insert Successfull";
        }
        
        $model->color = $request->input('color');
        $model->status = 1;
        $model->save();
        session()->flash('message', $msg);
        return redirect('admin/color');
    }

    function delete_color(Request $request, $id){
        $model = Color::find($id);
        $model->delete();
        session()->flash('message', 'Color Delete Successfull');
        return redirect('admin/color');
    }

    function status(Request $request, $status, $id){
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'Color Status Update');
        return redirect('admin/color');
    }
}
