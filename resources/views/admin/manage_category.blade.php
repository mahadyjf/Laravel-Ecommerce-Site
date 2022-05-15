@extends('admin.layout')
@section('title', 'Manage Category')
@section('ctegory_active', 'active')
@section('content')
<h1 class="py-1">Manage Category</h1>

<div class="row">
    
    <div class="col-lg-12">
        <a href="{{url('admin/category')}}" class="btn btn-primary">Back To Category</a>
   <div class="card">
    
    <div class="card-body">
        
       
        <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('category_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-4">
                        <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                        <select name="parent_category_id" class="form-control" aria-required="true" aria-invalid="false" required>
                            
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('category_slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_img" class="control-label mb-1">category_img</label>
                    <input id="category_img" value="" name="category_img" type="file" class="form-control" required>
                    @if($category_img == true)
                    <img height="80px" width="100px" src="{{asset('storage/category/'.$category_img)}}" alt="">
                    <input value="{{$category_img}}" type="hidden" name="old-image"/>
                    @endif
                </div>

                <div class="form-group">
                    <label for="is_home" class="control-label mb-1">Show In Home?</label>
                    <input id="is_home" name="is_home" type="checkbox" class="" required {{$is_home_checked}}>
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