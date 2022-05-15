<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $model['data'] = Customer::all();
        return view('admin.customer', $model);
    }

    public function view(Request $request, $id=null)
    {
        
            $arr = Customer::where('id', $id)->get();
            $data['customer_list']=$arr[0];
            return view('admin.customer_view', $data);
    }

    

    function status(Request $request, $status, $id){
        $model = Customer::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message', 'customer Status Update');
        return redirect('admin/customer');
    }
}
