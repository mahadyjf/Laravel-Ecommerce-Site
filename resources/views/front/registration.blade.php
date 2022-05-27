@extends('front/layout')
@section('title', "Registration || Daily Shop")
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
                  <form action="" class="aa-login-form" id="registrationFrm">
                     <label for="name">Name<span>*</span></label>
                     <input type="text" name="name" id="name" placeholder="Name">
                     <div id="name_error" class="field_error"></div>

                     <label for="email">Email<span>*</span></label>
                     <input type="email" name="email" id="email" placeholder="Email" required>
                     <div id="email_error" class="field_error"></div>

                     <label for="mobile">Mobile<span>*</span></label>
                     <input type="text" name="mobile" id="mobile" placeholder="Mobile" required>
                     <div id="mobile_error" class="field_error"></div>

                     <label for="password">Password<span>*</span></label>
                     <input type="password" name="password" id="password" placeholder="Password" required>
                     <div id="password_error" class="field_error"></div>
                     @csrf

                     <button type="submit" id="registrationbtn" class="aa-browse-btn">Register</button>                    
                   </form>

                 </div>
                 <div id="success_msg" class=""></div>
               </div>
             </div>          
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Cart view section -->

@endsection