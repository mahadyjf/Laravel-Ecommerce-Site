@extends('admin.layout')
@section('title', 'Tax');
@section('tax_active', 'active')
@section('content')

    <h1 class="">Tax</h1><br>

    <div class="row">
   

   <a href="{{url('admin/tax/manage_tax')}}"><button type="button" class="btn btn-primary ml-3 my-3" >Add Tax</button></a> 
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
                    <th>Tax Value</th>
                    <th>Tax Des</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->tax_value}}</td>
                    <td>{{$list->tax_des}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{url('admin/tax/manage_tax')}}/{{$list->id}}"><i class="fa fa-edit"> </i> Edit</a>
                        @if($list->status == 1)
                        <a class="btn btn-primary" href="{{url('/admin/tax/status/0')}}/{{$list->id}}"><i class="fa fa-active"> </i>Active</a>
                        @elseif($list->status == 0)
                        <a class="btn btn-warning" href="{{url('/admin/tax/status/1')}}/{{$list->id}}"><i class="fa fa-deactive"> </i>Deactive</a>
                        @endif
                        <a class="btn btn-danger" href="{{url('/admin/tax/delete_tax/')}}/{{$list->id}}"><i class="fa fa-trash"> </i> Delete</a>
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>
@endsection