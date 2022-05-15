<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $model['data'] = Tax::all();
        return view('admin.tax', $model);
    }

    public function manage_tax(Request $request, $id=null)
    {
        if($id>0){
            $arr = Tax::where('id', $id)->get();
            $result['tax_value'] = $arr['0']->tax_value;
            $result['tax_des'] = $arr['0']->tax_des;
            $result['id'] = $arr['0']->id;
        }else{
            $result['tax_value'] = '';
            $result['tax_des'] = '';
            $result['id'] = 0;
        }
        return view('admin.manage_tax', $result);
    }

    public function manage_tax_process(Request $request){
       //return $request->input('id');
        $request->validate([
            
            'tax_value' => 'required|unique:taxs,tax_value,'.$request->input('id'),
        ]);
        if($request->input('id')>0){
            $model = Tax::find($request->input('id'));
            $msg="Tax Updated";
        }else{
            $model = new Tax();
            $msg="Tax Insert Successfull";
        }
        
        $model->tax_value = $request->input('tax_value');
        $model->tax_des = $request->input('tax_des');
        $model->status = 0;
        $model->save();
        session()->flash('message', $msg);
        return redirect('admin/tax');
    }

    function delete_tax(Request $request, $id){
        $model = Tax::find($id);
        $model->delete();
        session()->flash('message', 'tax Delete Successfull');
        return redirect('admin/tax');
    }

    function status(Request $request, $status, $id){
        $model = Tax::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'tax Status Update');
        return redirect('admin/tax');
    }
}
