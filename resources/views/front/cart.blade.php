@extends('layouts.frontend')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>You Have <b>{{Cart::count()}}</b> Items in Your Shopping Cart </h2>
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
                        @foreach($prod as $p)
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
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::content() as $p)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{route('cart.delete',['id'=>$p->rowId])}}"><b>X</b></a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                 <a href="{{route('mobile.single',['id'=>$p->id])}}"><img width="145" height="145" alt="{{ asset($p->model->image) }}" class="shop_thumbnail" src="{{ asset($p->model->image) }}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="{{route('mobile.single',['id'=>$p->id])}}">{{$p->name}}</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">Rs:{{$p->price}}</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                   
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="{{$p->qty}}" min="0" step="1">
                                                    
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">Rs: {{$p->total()}}</span> 
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <a href="{{route('cart.checkout')}}" class="btn btn-primary" name="proceed">Checkout</a>
                                            </td>
                                 </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">

                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Rs: {{Cart::total()}}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">Rs: {{Cart::total()}}</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    

@endsection