@extends('front/layout')
@section('title', "Home || Daily Shop")
@section('container')

<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            
      
            <!-- single slide item -->  
            @foreach($home_banner as $list)
             <li>
              <div class="seq-model">
                <img data-seq src="{{asset('storage/home_banner/'.$list->image) }}" alt="Male Female slide img" />
              </div>
              @if($list->btn_text == '')
              <div class="seq-title">
                <a data-seq href="{{$list->btn_link}}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</S></a>
              </div>
              @else
              <div class="seq-title">
                <a data-seq href="{{$list->btn_link}}" class="aa-shop-now-btn aa-secondary-btn">{{$list->btn_text}}</a>
              </div>
              @endif
              
            </li>
            @endforeach                   
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo right -->
              <div class="col-md-12 no-padding">
                <div class="aa-promo-right">

                  @foreach($categories_home as $list)
                    <div class="aa-single-promo-right">
                        <div class="aa-promo-banner">                      
                        <img src="{{ asset('storage/category/'.$list->category_img) }}"  alt="img">                      
                        <div class="aa-prom-content">
                            <h4><a href="{{url('ctegory/'.$list->category_slug)}}">{{$list->category_name}}</a></h4>                        
                        </div>
                        </div>
                    </div>
                 @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    @foreach($categories_home as $list)
                        <li class=""><a href="#cat{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>
                    @endforeach
                    
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start product category -->
                    @php
                    $loop_count = 1;
                    @endphp
                    
                    @foreach($categories_home as $list)
                    @php
                      $cat_class = "";
                      if($loop_count == 1){
                        $cat_class = "in active";
                        $loop_count++;
                      }

                    @endphp
                    <div class="tab-pane fade {{$cat_class}}" id="cat{{$list->id}}">
                      <ul class="aa-product-catg">
                       
                        @if(isset($categories_products_home[$list->id][0]))

                          @foreach($categories_products_home[$list->id] as $products)
                            <li>
                              <figure>
                                <a class="aa-product-img" href="{{url('product_detail/'.$products->slug)}}"><img src="{{ asset('storage/'.$products->image) }}" height="250px" width="300px" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeaddToCart('{{$products->id}}', '{{$products_attr_home[$products->id][0]->size}}', '{{$products_attr_home[$products->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                <figcaption>
                                  <h4 class="aa-product-title"><a href="{{url('product_detail/'.$products->slug)}}">{{$products->name}}</a></h4>
                                  <span class="aa-product-price">$ {{$products_attr_home[$products->id][0]->price}}</span>
                                  <span class="aa-product-price"><del>$ {{$products_attr_home[$products->id][0]->mrp}}</del></span>
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
                    @endforeach
                    <!-- / product category -->
                  </div>
                  
                  <!-- quick view modal -->                  
                  <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">                      
                        <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-6 col-sm-6 col-xs-12">                              
                              <div class="aa-product-view-slider">                                
                                <div class="simpleLens-gallery-container" id="demo-1">
                                  <div class="simpleLens-container">
                                      <div class="simpleLens-big-image-container">
                                          <a class="simpleLens-lens-image" data-lens-image="{{ asset('front_assets/img/view-slider/large/polo-shirt-1.png') }}">
                                              <img src="{{ asset('front_assets/img/view-slider/medium/polo-shirt-1.png') }}" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('front_assets/img/view-slider/large/polo-shirt-1.png') }}"
                                         data-big-image="{{ asset('front_assets/img/view-slider/medium/polo-shirt-1.png') }}">
                                          <img src="{{ asset('front_assets/img/view-slider/thumbnail/polo-shirt-1.png') }}">
                                      </a>                                    
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('front_assets/img/view-slider/large/polo-shirt-3.png') }}"
                                         data-big-image="{{ asset('front_assets/img/view-slider/medium/polo-shirt-3.png') }}">
                                          <img src="{{ asset('front_assets/img/view-slider/thumbnail/polo-shirt-3.png') }}">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="{{ asset('front_assets/img/view-slider/large/polo-shirt-4.png') }}"
                                         data-big-image="{{ asset('front_assets/img/view-slider/medium/polo-shirt-4.png') }}">
                                          <img src="{{ asset('front_assets/img/view-slider/thumbnail/polo-shirt-4.png') }}">
                                      </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal view content -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="aa-product-view-content">
                                <h3>T-Shirt</h3>
                                <div class="aa-price-block">
                                  <span class="aa-product-view-price">$34.99</span>
                                  <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                                <h4>Size</h4>
                                <div class="aa-prod-view-size">
                                  <a href="#">S</a>
                                  <a href="#">M</a>
                                  <a href="#">L</a>
                                  <a href="#">XL</a>
                                </div>
                                <div class="aa-prod-quantity">
                                  <form action="">
                                    <select name="" id="">
                                      <option value="0" selected="1">1</option>
                                      <option value="1">2</option>
                                      <option value="2">3</option>
                                      <option value="3">4</option>
                                      <option value="4">5</option>
                                      <option value="5">6</option>
                                    </select>
                                  </form>
                                  <p class="aa-prod-category">
                                    Category: <a href="#">Polo T-Shirt</a>
                                  </p>
                                </div>
                                <div class="aa-prod-view-bottom">
                                  <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>                        
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{ asset('front_assets/img/fashion-banner.jpg') }}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li class="active"><a href="#tranding" data-toggle="tab">Tranding</a></li>
                <li><a href="#discounted" data-toggle="tab">Discounted</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
               
                
                <!-- start featured product category -->
                <div class="tab-pane fade in active" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    @if(isset($featured_products_home[$list->id][0]))

                          @foreach($featured_products_home[$list->id] as $products)
                            <li>
                              <figure>
                                <a class="aa-product-img" href="{{url('product_detail/'.$products->slug)}}"><img src="{{ asset('storage/'.$products->image) }}" height="250px" width="300px" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeaddToCart('{{$products->id}}', '{{$featured_products_attr_home[$products->id][0]->size}}', '{{$featured_products_attr_home[$products->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                <figcaption>
                                  <h4 class="aa-product-title"><a href="{{url('product_detail/'.$products->slug)}}">{{$products->name}}</a></h4>
                                  <span class="aa-product-price">$ {{$featured_products_attr_home[$products->id][0]->price}}</span>
                                  <span class="aa-product-price"><del>$ {{$featured_products_attr_home[$products->id][0]->mrp}}</del></span>
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
                <!-- / featured product category -->


                 <!-- Start men tranding category -->
                 <div class="tab-pane fade" id="tranding">
                  <ul class="aa-product-catg aa-tranding-slider">
                    <!-- start single product item -->
                    @if(isset($tranding_products_home[$list->id][0]))

                    @foreach($tranding_products_home[$list->id] as $products)
                      <li>
                        <figure>
                          <a class="aa-product-img" href="{{url('product_detail/'.$products->slug)}}"><img src="{{ asset('storage/'.$products->image) }}" height="250px" width="300px" alt="polo shirt img"></a>
                          <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeaddToCart('{{$products->id}}', '{{$tranding_products_attr_home[$products->id][0]->size}}', '{{$tranding_products_attr_home[$products->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <figcaption>
                            <h4 class="aa-product-title"><a href="{{url('product_detail/'.$products->slug)}}">{{$products->name}}</a></h4>
                            <span class="aa-product-price">$ {{$tranding_products_attr_home[$products->id][0]->price}}</span>
                            <span class="aa-product-price"><del>$ {{$tranding_products_attr_home[$products->id][0]->mrp}}</del></span>
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
                <!-- / popular product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="discounted">
                  <ul class="aa-product-catg aa-discounted-slider">
                    <!-- start single product item -->
                    @if(isset($discounted_products_home[$list->id][0]))

                    @foreach($discounted_products_home[$list->id] as $products)
                      <li>
                        <figure>
                          <a class="aa-product-img" href="{{url('product_detail/'.$products->slug)}}"><img src="{{ asset('storage/'.$products->image) }}" height="250px" width="300px" alt="polo shirt img"></a>
                          <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeaddToCart('{{$products->id}}', '{{$discounted_products_attr_home[$products->id][0]->size}}', '{{$discounted_products_attr_home[$products->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <figcaption>
                            <h4 class="aa-product-title"><a href="{{url('product_detail/'.$products->slug)}}">{{$products->name}}</a></h4>
                            <span class="aa-product-price">$ {{$discounted_products_attr_home[$products->id][0]->price}}</span>
                            <span class="aa-product-price"><del>$ {{$discounted_products_attr_home[$products->id][0]->mrp}}</del></span>
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
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  

  

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              @foreach($brands_home as $brand)
              <li><a href="#"><img src="{{ asset('storage/brand/'.$brand->image) }}" alt="{{$brand->name}}"></a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->
  <input type="hidden" id="qty" name="qty" value="1">
  <form id="addToCartForm">
      <input type="hidden" id="size_id" name="size_id">
      <input type="hidden" id="color_id" name="color_id">
    <input type="hidden" id="product_id" name="product_id">
    <input type="hidden" id="pqty" name="pqty">
    @csrf
    </form>

@endsection