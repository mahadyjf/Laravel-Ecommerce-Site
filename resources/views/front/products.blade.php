@extends('front/layout')
@section('title', "Products || Daily Shop")
@section('container')
 <!-- product category -->
 <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="" onchange="short_by()" id="short_by_val">
                    <option value="" selected="Default">Default</option>
                    <option value="name">Name</option>
                    <option value="price_asc">Price ASC</option>
                    <option value="price_desc">Price DSC</option>
                    <option value="date">Date</option>
                  </select>
                </form>
                {{$short_text}}
                
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @if(isset($products[0]))

                @foreach($products as $productArr)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product_detail/'.$productArr->slug)}}"><img src="{{ asset('storage/'.$productArr->image) }}" height="250px" width="300px" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeaddToCart('{{$productArr->id}}', '{{$products_attr[$productArr->id][0]->size}}', '{{$products_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product_detail/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                        <span class="aa-product-price">$ {{$products_attr[$productArr->id][0]->price}}</span>
                        <span class="aa-product-price"><del>$ {{$products_attr[$productArr->id][0]->mrp}}</del></span>
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
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                @foreach($categories as $cat)
                <li><a href="#">{{$cat->category_name}}</a></li>
                @endforeach
              </ul>
            </div>
            
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="button" onclick="short_price_filter()">Filter</button>
               </form>
              </div>

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                @foreach($color as $color)
                <a class="aa-color-{{strtolower($color->color)}}" href="javascript:void(0)" onclick="color_filter('{{$color->id}}')"></a>
                @endforeach
              </div>
            </div>
            
            
          </aside>
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

    <form id="shortByForm">
        <input type="hidden" id="short" name="short" value="{{$short}}">
        <input type="hidden" id="short_price_start" name="short_price_start" value="{{$short_price_start}}">
        <input type="hidden" id="short_price_end" name="short_price_end" value="{{$short_price_end}}">
        <input type="text" id="filter_color" name="filter_color" value="{{$filter_color}}">
    </form>

@endsection