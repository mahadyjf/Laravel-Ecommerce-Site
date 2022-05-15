@extends('admin.layout')
@section('title', 'Customer');
@section('customer_active', 'active')
@section('content')

    <h1 class="">Customer</h1><br>

    <div class="row">
   

   
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
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>City</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->mobile}}</td>
                    <td>{{$list->city}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{url('admin/customer/view/')}}/{{$list->id}}"><i class="fa fa-eiy"> </i> View</a>
                        @if($list->status == 1)
                        <a class="btn btn-primary" href="{{url('admin/customer/status/0')}}/{{$list->id}}"><i class="fa fa-active"> </i>Active</a>
                        @elseif($list->status == 0)
                        <a class="btn btn-warning" href="{{url('admin/customer/status/1')}}/{{$list->id}}"><i class="fa fa-deactive"> </i>Deactive</a>
                        @endif
                        
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>
@endsection