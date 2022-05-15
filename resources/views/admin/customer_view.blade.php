@extends('admin.layout')
@section('title', 'Customer');
@section('customer_active', 'active')
@section('content')

    <h1 class="">Customer</h1><br>

    <div class="row">
   

   <a href="{{url('admin/customer')}}"><button type="button" class="btn btn-primary ml-3 my-3" >Go To Customer</button></a> 
   @if(session()->has('message'))
   <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
       <span class="badge badge-pill badge-success">Success</span>
       {{session('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
   </div>
   @endif
    </div>
     <!-- DATA TABLE-->
     <div class="row">
     <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            
            <tbody>
                
                <tr>
                    <td><strong>Name</strong></td>
                    <td>{{$customer_list->name}}</td>
                </tr>

                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{$customer_list->email}}</td>
                </tr>

                <tr>
                    <td><strong>Mobile</strong></td>
                    <td>{{$customer_list->mobile}}</td>
                </tr>


                <tr>
                    <td><strong>Address</strong></td>
                    <td>{{$customer_list->address}}</td>
                </tr>

                <tr>
                    <td><strong>City</strong></td>
                    <td>{{$customer_list->city}}</td>
                </tr>


                <tr>
                    <td><strong>State</strong></td>
                    <td>{{$customer_list->state}}</td>
                </tr>


                <tr>
                    <td><strong>zip</strong></td>
                    <td>{{$customer_list->zip}}</td>
                </tr>


                <tr>
                    <td><strong>Company</strong></td>
                    <td>{{$customer_list->company}}</td>
                </tr>

                <tr>
                    <td><strong>GST</strong></td>
                    <td>{{$customer_list->gstin}}</td>
                </tr>

                <tr>
                    <td><strong>Created At</strong></td>
                    <td>{{\Carbon\Carbon::parse($customer_list->created_at)->format('d-M-Y || h:i')}}</td>
                </tr>

                <tr>
                    <td><strong>Updated At</strong></td>
                    <td>{{\Carbon\Carbon::parse($customer_list->updated_at)->format('d-M-Y || h:i')}}</td>
                    
                </tr>

                
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>
@endsection