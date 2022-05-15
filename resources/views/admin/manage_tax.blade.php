@extends('admin.layout')
@section('title', 'Tax');
@section('tax_active', 'active')
@section('content')
<h1 class="py-1">Manage Tax</h1>

<div class="row">
    
    <div class="col-lg-12">
        <a href="{{url('admin/tax')}}" class="btn btn-primary">Back To Tax</a>
   <div class="card">
    
    <div class="card-body">
        
       
        <form action="{{route('tax.manage_tax_process')}}" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <label for="tax_value" class="control-label mb-1">Tax Value</label>
                <input id="tax_value" value="{{$tax_value}}" name="tax_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('tax_value')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="tax_des" class="control-label mb-1">Tax Des.</label>
                <input id="tax_des" value="{{$tax_des}}" name="tax_des" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('tax_des')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

           
  
            <input type="hidden" value="{{$id}}" name="id">
 
            <div>
                <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                    
                   Save
                    
                </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection