@extends('admin.layout')
@section('title', 'Manage Color')
@section('color_active', 'active')
@section('content')
<h1 class="py-1">Manage color</h1>

<div class="row">
    
    <div class="col-lg-12">
        <a href="{{url('admin/color')}}" class="btn btn-primary">Back To Color</a>
   <div class="card">
    
    <div class="card-body">
        
       
        <form action="{{route('color.manage_color_process')}}" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <label for="color" class="control-label mb-1">Color</label>
                <input id="color" value="{{$color}}" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('color')
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