@extends('front/layout')
@section('title', $product_detail[0]->name)
@section('container')

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{ asset('storage/'.$product_detail[0]->image) }}" class="simpleLens-lens-image"><img src="{{ asset('storage/'.$product_detail[0]->image) }}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                        @if($product_image[$product_detail[0]->id][0])
                          @foreach($product_image[$product_detail[0]->id] as $list)
                          <a data-big-image="{{ asset('storage/'.$list->image) }}" data-lens-image="{{ asset('storage/'.$list->image) }}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{ asset('storage/'.$list->image) }}" height="50px">
                          </a>     
                          @endforeach
                        @endif
                                                         
                          
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                  <h3>{{$product_detail[0]->name}}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">$ {{$product_detail_attr[$product_detail[0]->id][0]->price}}</span>
                      <del><span class="aa-product-view-price">$ {{$product_detail_attr[$product_detail[0]->id][0]->mrp}}</span></del>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                      <p class="lead_time">Delivery Time: <span>{{$product_detail[0]->lead_time}}</span></p>
                    </div>
                    {!! $product_detail[0]->short_desc !!}
                    @if($product_detail_attr[$product_detail[0]->id][0]->size_id>0)
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      @php
                        $arrSize = [];
                        foreach($product_detail_attr[$product_detail[0]->id] as $attr){
                          $arrSize[] = $attr->size;
                        }
                          $arrSize=array_unique($arrSize);
                      @endphp
                      @foreach($arrSize as $attr)
                        @if($attr != '')
                          <a href="javascript:void(0)" onclick="showColor('{{$attr}}')" id="size_{{$attr}}" class="size_link">{{$attr}}</a>
                        @endif
                      @endforeach
                    </div>
                    
                    @endif

                    @if($product_detail_attr[$product_detail[0]->id][0]->color_id>0)
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      @foreach($product_detail_attr[$product_detail[0]->id] as $attr)
                      @php
                     
                      @endphp
                        @if($attr->color != '')
                          <a href="javascript:void(0)" class="aa-color-{{strtolower($attr->color)}} product_color size_{{$attr->size}}" onclick='change_product_color_image("{{ asset("storage/".$attr->attr_image) }}", "{{$attr->color}}")'></a>
                          
                        @endif
                      @endforeach
                      
                                        
                    </div>
                    @endif
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="qty" name="qty">
                          @for($i=1; $i<11; $i++)
                          <option value="{{$i}}">{{$i}}</option>
                          @endfor
                          
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Model: <a href="#">{{$product_detail[0]->model}}</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="addToCart('{{$product_detail[0]->id}}', '{{$product_detail_attr[$product_detail[0]->id][0]->size_id}}', '{{$product_detail_attr[$product_detail[0]->id][0]->color_id}}')">Add To Cart</a>
                      <div id="addToCart_mag"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#technical_specification" data-toggle="tab">Technical Specification</a></li>
                <li><a href="#uses" data-toggle="tab">Uses</a></li>
                <li><a href="#warranty" data-toggle="tab">Warranty</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  {!! $product_detail[0]->desc !!}
                </div>
                <div class="tab-pane fade" id="technical_specification">
                  {!! $product_detail[0]->technical_specification !!}
                </div>
                <div class="tab-pane fade" id="uses">
                  {!! $product_detail[0]->uses !!}
                </div>
                <div class="tab-pane fade" id="warranty">
                  {!! $product_detail[0]->warranty !!}
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @if(isset($related_product[0]))

                @foreach($related_product as $products)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product_detail/'.$products->slug)}}"><img src="{{ asset('storage/'.$products->image) }}" height="250px" width="300px" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn" href="javascript:void(0)" onclick="addToCart('{{$products->id}}', '{{$related_product_attr[$products->id][0]->size_id}}', '{{$related_product_attr[$products->id][0]->color_id}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product_detail/'.$products->slug)}}">{{$products->name}}</a></h4>
                        <span class="aa-product-price">$ {{$related_product_attr[$products->id][0]->price}}</span>
                        <span class="aa-product-price"><del>$ {{$related_product_attr[$products->id][0]->mrp}}</del></span>
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
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
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
              </div>
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
  <form id="addToCartForm">
  <input type="hidden" id="size_id" name="size_id">
  <input type="hidden" id="color_id" name="color_id">
  <input type="hidden" id="product_id" name="product_id">
  <input type="hidden" id="pqty" name="pqty">
  @csrf
  </form>

@endsection