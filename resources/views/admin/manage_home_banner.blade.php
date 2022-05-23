@extends('admin.layout')
@section('title', 'Manage Home Banner')
@section('home_banner_active', 'active')
@section('content')
<h1 class="py-1">Manage Category</h1>

<div class="row">
    
    <div class="col-lg-12">
        <a href="{{url('admin/home_banner')}}" class="btn btn-primary">Back To Home Banner</a>
   <div class="card">
    
    <div class="card-body">
        
       
        <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="btn_text" class="control-label mb-1">BTN Text</label>
                        <input id="btn_text" value="{{$btn_text}}" name="btn_text" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('btn_text')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="col-md-6">
                        <label for="btn_link" class="control-label mb-1">BTN Link</label>
                        <input id="btn_link" value="{{$btn_link}}" name="btn_link" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('btn_link')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" class="control-label mb-1">Image</label>
                    <input id="image" value="" name="image" type="file" class="form-control" required>
                    @if($image == true)
                    <img height="80px" width="100px" src="{{asset('storage/home_banner/'.$image)}}" alt="">
                    
                    @endif
                </div>

                
                
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