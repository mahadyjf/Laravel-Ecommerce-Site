@extends('admin.layout')
@section('title', 'brand');
@section('brand_active', 'active')
@section('content')

    <h1 class="">Brand</h1><br>

    <div class="row">
   

   <a href="{{url('admin/brand/manage_brand')}}"><button type="button" class="btn btn-primary ml-3 my-3" >Add Brand</button></a> 
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
                    <th>Brand</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody >
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td><img height="60px" width="60px" src="{{asset('storage/brand/'.$list->image)}}" alt="{{$list->image}}"></td>
                    <td>
                        <a class="btn btn-danger" href="{{url('admin/brand/manage_brand')}}/{{$list->id}}"><i class="fa fa-edit"> </i> Edit</a>
                        @if($list->status == 1)
                        <a class="btn btn-primary" href="{{url('/admin/brand/status/0')}}/{{$list->id}}"><i class="fa fa-active"> </i>Active</a>
                        @elseif($list->status == 0)
                        <a class="btn btn-warning" href="{{url('/admin/brand/status/1')}}/{{$list->id}}"><i class="fa fa-deactive"> </i>Deactive</a>
                        @endif
                        <a class="btn btn-danger" href="{{url('/admin/brand/delete_brand/')}}/{{$list->id}}"><i class="fa fa-trash"> </i> Delete</a>
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>
@endsection