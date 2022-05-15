<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\coupon;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model['data'] = coupon::all();
        return view('admin.coupon', $model);
    }

    public function manage_coupon(Request $request, $id=null)
    {
        if($id>0){
            $arr = coupon::where('id', $id)->get();
            $result['title'] = $arr['0']->title;
            $result['code'] = $arr['0']->code;
            $result['value'] = $arr['0']->value;
            $result['id'] = $arr['0']->id;
            $result['type'] = $arr['0']->type;
            $result['min_order_amt'] = $arr['0']->min_order_amt;
            $result['is_one_time'] = $arr['0']->is_one_time;
        }else{
            $result['title'] = '';
            $result['code'] = '';
            $result['value'] = '';
            $result['id'] = 0;
            $result['type'] = '';
            $result['min_order_amt'] = '';
            $result['is_one_time'] = '';
        }
        return view('admin.manage_coupon', $result);
    }

    public function manage_coupon_process(Request $request){
       //return $request->input('id');
        $request->validate([
            'title' => 'required',
            'code' => 'required|unique:coupons,code,'.$request->input('id'),
            'value' => 'required',
        ]);
        if($request->input('id')>0){
            $model = coupon::find($request->input('id'));
            $msg="Coupon Updated";
        }else{
            $model = new coupon();
            $msg="Coupon Insert Successfull";
        }
        
        $model->title = $request->input('title');
        $model->code = $request->input('code');
        $model->value = $request->input('value');
        $model->type = $request->input('type');
        $model->min_order_amt = $request->input('min_order_amt');
        $model->is_one_time = $request->input('is_one_time');
        $model->status = 0;
        $model->save();
        session()->flash('message', $msg);
        return redirect('admin/coupon');
    }

    function delete_coupon(Request $request, $id){
        $model = coupon::find($id);
        $model->delete();
        session()->flash('message', 'Coupon Delete Successfull');
        return redirect('admin/coupon');
    }

    function status(Request $request, $status, $id){
        $model = coupon::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'Coupon Status Update');
        return redirect('admin/coupon');
    }
}
