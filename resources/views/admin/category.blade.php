@extends('admin.layout')
@section('title', 'Category');
@section('ctegory_active', 'active')
@section('content')

    <h1 class="">Category</h1><br>

    <div class="row">
   

   <a href="{{url('admin/category/manage_category')}}"><button type="button" class="btn btn-primary ml-3 my-3" >Add Category</button></a> 
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
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->category_name}}</td>
                    <td>{{$list->category_slug}}</td>
                    <td><img height="60px" width="60px" src="{{asset('storage/category/'.$list->category_img)}}" alt="{{$list->category_img}}"></td>
                    <td>
                        <a class="btn btn-danger" href="{{url('admin/category/manage_category')}}/{{$list->id}}"><i class="fa fa-edit"> </i> Edit</a>
                        @if($list->status == 1)
                        <a class="btn btn-primary" href="{{url('/admin/category/status/0')}}/{{$list->id}}"><i class="fa fa-active"> </i>Active</a>
                        @elseif($list->status == 0)
                        <a class="btn btn-warning" href="{{url('/admin/category/status/1')}}/{{$list->id}}"><i class="fa fa-deactive"> </i>Deactive</a>
                        @endif
                        <a class="btn btn-danger" href="{{url('/admin/category/delete_category/')}}/{{$list->id}}"><i class="fa fa-trash"> </i> Delete</a>
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>
@endsection