@extends('admin.layout')
@section('title', 'Product');
@section('product_active', 'active')
@section('content')
<h1 class="py-1">Manage Product</h1>
@error('attr_image.*')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
@if(session()->has('sku_error'))
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Error!</span>
                {{session('sku_error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
<a href="{{url('admin/product')}}" class="btn btn-primary">Back To Product</a>
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<form action="{{route('product.manage_product_process')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
        
       
        
            @csrf
            <div class="form-group">
                <label for="name" class="control-label mb-1">Name</label>
                <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="name" class="control-label mb-1">Image</label>
                <input id="image" value="" name="image" type="file" class="form-control" required>
                @if($image == true)
                <img height="80px" width="100px" src="{{asset('storage/'.$image)}}" alt="">
                <input value="{{$image}}" type="hidden" name="old-image"/>
                @endif
            </div>
            
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="category" class="control-label mb-1">Category</label>
                        <select name="category" class="form-control" aria-required="true" aria-invalid="false" required>
                            <option>Select Category</option>
                            @foreach($category as $cat)
                            @if($category_id == $cat->id)
                                <option selected value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @else
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endif
                               
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="slug" class="control-label mb-1">Slug</label>
                        <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            
                        @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        
                    <div class="col-md-4">
                        <label for="brand" class="control-label mb-1">Brand</label>
                        <select name="brand" class="form-control" aria-required="true" aria-invalid="false" required>
                            <option>Select Brand</option>
                            @foreach($brand as $list)
                            @if($brand_id == $list->id)
                                <option selected value="{{$list->id}}">{{$list->name}}</option>
                            @else
                                <option value="{{$list->id}}">{{$list->name}}</option>
                            @endif
                               
                            @endforeach
                        </select>
           
                        @error('brand')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
               
            

            
                

            
                


            <div class="form-group">
                <label for="model" class="control-label mb-1">model</label>
                <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('model')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="short_desc" class="control-label mb-1">Short Description</label>
                <textarea id="short_desc"  name="short_desc" class="form-control" aria-required="true" aria-invalid="false" required>
                    {{$short_desc}}
                </textarea>
            </div>
            @error('short_desc')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="desc" class="control-label mb-1">Description</label>
                <textarea id="desc"  name="desc" class="form-control" aria-required="true" aria-invalid="false" required>
                    {{$desc}}
                </textarea>
            </div>
            @error('desc')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="keywords" class="control-label mb-1">Keywords</label>
                <input id="keywords" value="{{$keywords}}" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('keywords')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                <input id="technical_specification" value="{{$technical_specification}}" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('technical_specification')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <div class="form-group">
                <label for="uses" class="control-label mb-1">Uses</label>
                <input id="uses" value="{{$uses}}" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('uses')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="warranty" class="control-label mb-1">Warranty</label>
                <input id="warranty" value="{{$warranty}}" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            @error('warranty')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="lead_time" class="control-label mb-1">Lead Time</label>
                        <input id="lead_time" value="{{$lead_time}}" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    @error('lead_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-6">
                        <label for="tax" class="control-label mb-1">Tax</label>
                        <select id="tax_id" name="tax_id" class="form-control" aria-required="true" aria-invalid="false" required>
                            <option value="">Select Tax</option>
                            @foreach($tax as $list)
                            
                            @if($tax_id == $list->id)
                                <option selected value="{{$list->id}}">{{$list->tax_des}}</option>
                            @else
                                <option  value="{{$list->id}}">{{$list->tax_des}}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>
                    @error('tax_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="is_promo" class="control-label mb-1">IS Promo</label>
                        <select name="is_promo" class="form-control" aria-required="true" aria-invalid="false">
                            
                            @if($is_promo == 1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                            @endif
                               
                        </select>
                    </div>
                    @error('is_promo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-3">
                        <label for="is_featured" class="control-label mb-1">IS Featured</label>
                        <select name="is_featured" class="form-control" aria-required="true" aria-invalid="false" >
                            
                            @if($is_featured == 1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                            @endif
                               
                        </select>
                    </div>
                    @error('is_featured')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-3">
                        <label for="is_discounted" class="control-label mb-1">IS Discounted</label>
                        <select name="is_discounted" class="form-control" aria-required="true" aria-invalid="false">
                            
                            @if($is_discounted == 1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                            @endif
                               
                        </select>
                    </div>
                    @error('is_discounted')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-3">
                        <label for="is_tranding" class="control-label mb-1">IS Tranding</label>
                        <select name="is_tranding" class="form-control" aria-required="true" aria-invalid="false">
                            
                            @if($is_tranding == 1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                            @endif
                               
                        </select>
                    </div>
                    @error('is_tranding')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>

  
            <input type="hidden" value="{{$id}}" name="id">
 
            
        
            </div>
        </div>
    </div>




    <h1>Product Images</h1>
    <div class="col-lg-12" >
        
        
        
        
        <div class="card">
            <div class="card-body">
                
                <div class="form-group">
                    <div class="row" id="product_img_box">
                   
                        @php 
                        $loop_img_count_num=1;
                        @endphp
                        @foreach($productimgArr as $key=> $val)
                        @php 
                        $loop_img_prev_num=$loop_img_count_num;
                        
                        $pirr = (array)$val;
                        @endphp
                   
                    <div class="col-md-3"  id="product_img_{{$loop_img_count_num++}}">
                        <input id="piid" value="{{$pirr['id']}}" name="piid[]" type="hidden" >
                        <label for="attr_image" class="control-label mb-1">Images</label>
                        <input id="images"  name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                        @if($pirr['image'])
                        <img height="50px" width="50px" src="{{asset('storage/'.$pirr['image'])}}" alt="">
                        @endif
                        
                    </div>

                    @if($loop_img_count_num == 2)
                    <div class="col-md-3">
                        <label for="" class="control-label mb-1">Action</label><br>
                        <button type="button" onClick="add_img_more()" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>
                    @else
                    <a href="{{url('admin/product/product_images_delete/')}}/{{$pirr['id']}}/{{$id}}">
                    <div class="col-md-3"><label for="" class="control-label mb-1">Action</label><br><button type="button" onClick="remove_img('{{$loop_img_prev_num}}')" class="btn btn-danger"><i class="fa fa-minus"></i>Remove</button></div></a>
                    @endif
                  
                    @endforeach
                    


                 </div>
                </div>
            </div>
        </div>
        
    </div>



    <h1>Product Attriutes</h1>
    <div class="col-lg-12" id="product_attr_box">
        @php 
        $loop_count_num=1;
        @endphp
        @foreach($productAttrArr as $key=> $val)
        @php 
        $loop_prev_num=$loop_count_num;
        $parr = (array)$val;
        @endphp
        
        
        <input id="pid" value="{{$parr['id']}}" name="pid[]" type="hidden" >
        <div class="card" id="product_attr_{{$loop_count_num++}}">
            <div class="card-body">
                
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-2">
                        <label for="sku" class="control-label mb-1">SKU</label>
                        <input id="sku" value="{{$parr['sku']}}" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('sku')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-2">
                        <label for="mrp" class="control-label mb-1">MRP</label>
                        <input id="mrp" value="{{$parr['mrp']}}" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('mrp')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-2">
                        <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" value="{{$parr['price']}}" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="col-md-3">
                        <label for="size" class="control-label mb-1">Size</label>
                        <select id="size" name="size[]" class="form-control" aria-required="true" aria-invalid="false" required>
                            <option value="">Select Category</option>
                            @foreach($size as $list)
                            
                            @if($parr['size_id']== $list->id)
                                <option selected value="{{$list->id}}">{{$list->size}}</option>
                            @else
                                <option  value="{{$list->id}}">{{$list->size}}</option>
                            @endif
                               
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="color" class="control-label mb-1">Color</label>
                        <select id="color" name="color[]" class="form-control" aria-required="true" aria-invalid="false" required>
                            <option value="">Select Category</option>
                            @foreach($color as $list)
                            
                            @if($parr['color_id']== $list->id)
                                <option selected value="{{$list->id}}">{{$list->color}}</option>
                            @else
                                <option  value="{{$list->id}}">{{$list->color}}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="qty" class="control-label mb-1">QTY</label>
                        <input id="qty" value="{{$parr['qty']}}" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('qty')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col-md-3">
                        <label for="attr_image" class="control-label mb-1">Image</label>
                        <input id="attr_image" value="{{$parr['attr_image']}}" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="col-md-3 py-3">
                    <img height="50px" width="50px" src="{{asset('storage/'.$parr['attr_image'])}}" alt="">
                    </div>
                   

                    @if($loop_count_num == 2)
                    <div class="col-md-3">
                        <label for="" class="control-label mb-1">Action</label><br>
                        <button type="button" onClick="add_more()" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>
                    @else
                    <a href="{{url('admin/product/product_attr_delete/')}}/{{$parr['id']}}/{{$id}}">
                    <div class="col-md-3"><label for="" class="control-label mb-1">Action</label><br><button type="button" onClick="remove('{{$loop_prev_num}}')" class="btn btn-danger"><i class="fa fa-minus"></i> Remove</button></div></a>
                    @endif
                    


                 </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>



        <div>
            <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                
            Save
                
            </button>
        </div>
    </form>
</div>

<script>
    var loopCount =1;
   function add_more(){
        loopCount++
       var html = '<input id="pid" name="pid[]" type="hidden" ><div class="card" id="product_attr_'+loopCount+'"><div class="card-body"><div class="form-group"><div class="row">';
        html+= '<div class="col-md-2"> <label for="sku" class="control-label mb-1">SKU</label><input id="sku" value="" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div> @error('sku') <div class="alert alert-danger">{{ $message }}</div> @enderror';
        html+='<div class="col-md-2"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" value="" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html+=' <div class="col-md-2"><label for="price" class="control-label mb-1">Price</label><input id="price" value="" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        var size = $('#size').html();
        size = size.replace('selected', '');
        html+='<div class="col-md-3"><label for="size" class="control-label mb-1">Size</label><select id="" name="size[]" class="form-control" aria-required="true" aria-invalid="false" required>'+size+'</select></div>';
        var color = $('#color').html();
        color = color.replace('selected', '');
        html+='<div class="col-md-3"><label for="size" class="control-label mb-1">Color</label><select id="" name="color[]" class="form-control" aria-required="true" aria-invalid="false" required>'+color+'</select></div>';
        html+='<div class="col-md-2"><label for="qty" class="control-label mb-1">QTY</label><input id="qty" value="" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html+='<div class="col-md-3"><label for="attr_image" class="control-label mb-1">Image</label><input id="attr_image" value="" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required></div>';
        html+=' <div class="col-md-3"><label for="attr_image" class="control-label mb-1">Action</label><br><button type="button" onClick=remove("'+loopCount+'") class="btn btn-danger"><i class="fa fa-minus"></i> Remove</button></div>';
        html+= '</div></div></div></div>';

    
        $("#product_attr_box").append(html);
    }

    function remove(loopCount){
        $('#product_attr_'+loopCount).remove();
    }

    var imgloopCount=1;
    function add_img_more(){
        imgloopCount++
        var html = '<div class="col-md-3" id="product_img_'+imgloopCount+'"><input id="piid" name="piid[]" type="hidden"><label for="attr_image" class="control-label mb-1">Images</label><input id="images"  name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>';
        html+='<div class="col-md-3"><label for="" class="control-label mb-1">Action</label><br><button type="button" onClick=remove_img("'+imgloopCount+'") class="btn btn-danger"><i class="fa fa-minus"></i> Remove</button></div>'
        html+='</div>';
        
    
    $("#product_img_box").append(html);
    }


    function remove_img(imgloopCount){
        $('#product_img_'+imgloopCount).remove();
    }

    CKEDITOR.replace( 'short_desc' );
    CKEDITOR.replace( 'desc' );
    CKEDITOR.replace( 'technical_specification' );

</script>
@endsection