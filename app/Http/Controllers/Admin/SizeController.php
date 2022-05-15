<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $model['data'] = Size::all();
        return view('admin.size', $model);
    }

    public function manage_size(Request $request, $id=null)
    {
        if($id>0){
            $arr = Size::where('id', $id)->get();
            $result['size'] = $arr['0']->size;
            $result['id'] = $arr['0']->id;
        }else{
            $result['size'] = '';
            $result['id'] = 0;
        }
        return view('admin.manage_size', $result);
    }

    public function manage_size_process(Request $request){
       //return $request->input('id');
        $request->validate([
            
            'size' => 'required|unique:sizes,size,'.$request->input('id'),
        ]);
        if($request->input('id')>0){
            $model = Size::find($request->input('id'));
            $msg="Size Updated";
        }else{
            $model = new Size();
            $msg="Size Insert Successfull";
        }
        
        $model->size = $request->input('size');
        $model->status = 0;
        $model->save();
        session()->flash('message', $msg);
        return redirect('admin/size');
    }

    function delete_size(Request $request, $id){
        $model = Size::find($id);
        $model->delete();
        session()->flash('message', 'Size Delete Successfull');
        return redirect('admin/size');
    }

    function status(Request $request, $status, $id){
        $model = Size::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'Size Status Update');
        return redirect('admin/size');
    }
}
