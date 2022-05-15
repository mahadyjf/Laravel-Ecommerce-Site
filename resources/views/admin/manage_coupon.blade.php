@extends('admin.layout')
@section('title', 'Manage Category');
@section('coupon_active', 'active')
@section('content')
<h1 class="py-1">Manage Coupon</h1>

<div class="row">
    
    <div class="col-lg-12">
        <a href="{{url('admin/coupon')}}" class="btn btn-primary">Back To Coupon</a>
   <div class="card">
    
    <div class="card-body">
        
       
        <form action="{{route('coupon.manage_coupon_process')}}" method="post" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                    <label for="code" class="control-label mb-1">Code </label>
                    <input id="code" value="{{$code}}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="value" class="control-label mb-1">Value</label>
                        <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('value')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label for="type" class="control-label mb-1">Type</label>
                        <select name="type" class="form-control" aria-required="true" aria-invalid="false">
                            
                            @if($type == "Value")
                                <option selected value="Value">Value</option>
                                <option value="Per">Persentage</option>
                            @elseif($type == "Per")
                                <option value="Value">Value</option>
                                <option selected value="Per">Persentage</option>
                            @else
                            <option value="Value">Value</option>
                            <option value="Per">Persentage</option>
                            @endif
                               
                        </select>
                    </div>
                    @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="min_order_amt" class="control-label mb-1">Min Order Amt</label>
                        <input id="min_order_amt" value="{{$min_order_amt}}" name="min_order_amt" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    @error('min_order_amt')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6">
                        <label for="is_one_time" class="control-label mb-1">IS One Time</label>
                        <select name="is_one_time" class="form-control" aria-required="true" aria-invalid="false">
                            
                            @if($is_one_time == 1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                            @endif
                               
                        </select>
                    </div>
                    @error('is_one_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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