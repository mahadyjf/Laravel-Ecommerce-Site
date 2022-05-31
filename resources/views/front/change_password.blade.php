@extends('front/layout')
@section('title', "Forget Password || Daily Shop")
@section('container')

<!-- Cart view section -->
<section id="aa-myaccount">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="aa-myaccount-area">         
             <div class="row">
               <div class="col-md-6">
                 <div class="aa-myaccount-register">                 
                  <h4>Register</h4>
                  <form action="" class="aa-login-form" id="forgetChangeFrm">
                    
                     <label for="password">Password<span>*</span></label>
                     <input type="password" name="forget_password" id="forget_password" placeholder="Password" required>
                     <div id="password_error" class="field_error"></div>
                     @csrf

                     <button type="submit" id="forgetChangebtn" class="aa-browse-btn">Change</button>                    
                   </form>

                 </div>
                 <div id="forget_success_msg" class=""></div>
               </div>
             </div>          
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Cart view section -->

@endsection