@extends('layouts.frontend')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="/results" method="get">
                            <input type="text" placeholder="Search products..." name="query">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        @foreach($prodall as $p)
                        <div class="thubmnail-recent">
                            <img src="{{($p->image)}}" class="recent-thumb" alt="">
                            <h2><a href="{{route('mobile.single',['id'=>$p->id])}}">{{$p->name}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>Rs: {{$p->price}}</ins>
                            </div>                             
                        </div>
                        @endforeach

                    </div>
                </div>
                
                <div class="col-md-8">

                                <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::content() as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$item->name}} <strong class="product-quantity">× {{$item->qty}}</strong> </td>
                                                <td class="product-total">
                                                    <span class="amount">Rs: {{$item->total()}}</span> </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">Rs: {{Cart::total()}}</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">Rs: {{number_format(Cart::total())}}</span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div>
                                        <span style="float: right;">
                                        <form action="{{route('cart.checkout')}}" method="POST">
                                            {{csrf_field()}}
                                          <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_v8fXuNocNWbt2nhEvUGZlQUL"
                                            data-amount="{{Cart::total() * 100}}"
                                            data-name="{{$setting->name}}"
                                            data-description="Now Buy Your Mobile"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto">
                                          </script>
                                        </form>
                                        </span>
                                    </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    

@endsection