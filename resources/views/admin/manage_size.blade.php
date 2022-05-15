@extends('admin.layout')
@section('title', 'Manage Size')
@section('size_active', 'active')
@section('content')
<h1 class="py-1">Manage Size</h1>

<div class="row">
    
    <div class="col-lg-12">
        <a href="{{url('admin/size')}}" class="btn btn-primary">Back To Size</a>
   <div class="card">
    
    <div class="card-body">
        
       
        <form action="{{route('size.manage_size_process')}}" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <label for="size" class="control-label mb-1">Size</label>
                <input id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('size')
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