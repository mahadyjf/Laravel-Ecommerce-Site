@extends('front/layout')
@section('title', "Cart || Daily Shop")
@section('container')
 <!-- Cart view section -->
 <section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            @if(isset($list[0]))
            <div class="cart-view-table">
              <form action="">
                
                @php
                  $totalPrice= 0;
                @endphp
                <div class="table-responsive">
                    
                   <table class="table">
                     <thead>
                       <tr>
                         <th></th>
                         <th></th>
                         <th>Product</th>
                         <th>Price</th>
                         <th>Quantity</th>
                         <th>Total</th>
                       </tr>
                     </thead>

                     <tbody>
                         @foreach($list as $data)
                         @php
                          $totalPrice= $totalPrice + ($data->price*$data->qty);
                         @endphp
                       <tr id="cart_box{{$data->attr_id}}">
                         <td><a class="remove" href="javascript:void(0)" onclick="deleteCartProduct('{{$data->pid}}', '{{$data->size}}', '{{$data->color}}', '{{$data->attr_id}}')"><fa class="fa fa-close"></fa></a></td>
                         <td><a href="{{url('product_detail/'.$data->slug)}}"><img src="{{ asset('storage/'.$data->image) }}" alt="img"></a></td>
                         <td><a class="aa-cart-title" href="{{url('product_detail/'.$data->slug)}}">{{$data->name}}</a></td>
                         <td>{{$data->price}}</td>
                         <td><input id="qty{{$data->attr_id}}" class="aa-cart-quantity" type="number" onchange="updateQty('{{$data->pid}}', '{{$data->size}}', '{{$data->color}}', '{{$data->attr_id}}', '{{$data->price}}')" value="{{$data->qty}}"></td>
                         <td id="total_price_{{$data->attr_id}}">$ {{$data->price*$data->qty}}</td>
                       </tr>
                      @endforeach
                       <tr>
                         <td colspan="6" class="aa-cart-view-bottom">
                           <div class="aa-cart-coupon">
                             <input class="aa-coupon-code" type="text" placeholder="Coupon">
                             <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                           </div>
                           
                         </td>
                       </tr>
                       </tbody>
                   </table>
                 </div>
                 
              </form>
              <!-- Cart Total view -->
              <div class="cart-view-total">
                <h4>Cart Totals</h4>
                <table class="aa-totals-table">
                  <tbody>
                    <tr>
                      <th>Subtotal</th>
                      <td>${{$totalPrice}}</td>
                    </tr>
                    <tr>
                      <th>Total</th>
                      <td>${{$totalPrice}}</td>
                    </tr>
                  </tbody>
                </table>
                <a href="{{url('checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
              </div>
            </div>
            @else
                    <h3>No Data Found</h3>
                @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Cart view section -->
  <input type="hidden" id="qty" name="qty" value="1">
  <form id="addToCartForm">
      <input type="hidden" id="size_id" name="size_id">
      <input type="hidden" id="color_id" name="color_id">
    <input type="hidden" id="product_id" name="product_id">
    <input type="hidden" id="pqty" name="pqty">
    @csrf
    </form>

  @endsection