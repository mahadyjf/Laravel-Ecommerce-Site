<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    public function auth(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        //$result = Admin::where(['email'=>$email, 'password'=>$password])->get();
        $result = Admin::where(['email'=>$email])->first();

        if($result){
            if(Hash::check($password, $result->password)){
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error', 'Pleas Enter Correct Password');
                return redirect('admin');
            }
            
        }else{
            $request->session()->flash('error', 'Pleas Enter Valide Email & Password');
            return redirect('admin');
        }
    }

    

   
   
}
