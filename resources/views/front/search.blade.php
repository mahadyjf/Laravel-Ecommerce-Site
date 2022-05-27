@extends('front/layout')
@section('title', "Search || Daily Shop")
@section('container')
 <!-- product category -->
 <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-8">
          <div class="aa-product-catg-content">
            
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @if(isset($search[0]))

                @foreach($search as $productArr)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product_detail/'.$productArr->slug)}}"><img src="{{ asset('storage/'.$productArr->image) }}" height="250px" width="300px" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeaddToCart('{{$productArr->id}}', '{{$search_attr[$productArr->id][0]->size}}', '{{$search_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product_detail/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                        <span class="aa-product-price">$ {{$search_attr[$productArr->id][0]->price}}</span>
                        <span class="aa-product-price"><del>$ {{$search_attr[$productArr->id][0]->mrp}}</del></span>
                      </figcaption>
                    </figure>                         
                  </li>
                @endforeach
                  
              @else
                <li style="display: flex; color:brown">
                  <figure>
                    !No Data Found
                  </figure>                         
                </li>
              @endif
       
              </ul>

            </div>
            
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- / product category -->
  <input type="hidden" id="qty" name="qty" value="1">
  <form id="addToCartForm">
      <input type="hidden" id="size_id" name="size_id">
      <input type="hidden" id="color_id" name="color_id">
    <input type="hidden" id="product_id" name="product_id">
    <input type="hidden" id="pqty" name="pqty">
    @csrf
    </form>

  

@endsection