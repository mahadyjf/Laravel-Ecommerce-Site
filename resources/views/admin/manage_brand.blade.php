@extends('admin.layout')
@section('title', 'brand');
@section('brand_active', 'active')
@section('content')
<h1 class="py-1">Manage brand</h1>

<div class="row">
    
    <div class="col-lg-12">
        <a href="{{url('admin/brand')}}" class="btn btn-primary">Back To Brand</a>
   <div class="card">
    
    <div class="card-body">
        
       
        <form action="{{route('brand.manage_brand_process')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="control-label mb-1">Name</label>
                <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="image" class="control-label mb-1">Image</label>
                <input id="image" value="" name="image" type="file" class="form-control" required>
                @if($image == true)
                <img height="80px" width="100px" src="{{asset('storage/brand/'.$image)}}" alt="">
                <input value="{{$image}}" type="hidden" name="old-image"/>
                @endif
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="is_home" class="control-label mb-1">Show In Home?</label>
                <input id="is_home" name="is_home" type="checkbox" class="" required {{$is_home_checked}}>
            </div>
           
  
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