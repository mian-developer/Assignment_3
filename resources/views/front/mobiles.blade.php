@extends('layouts.frontend')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Mobiles</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach($prodp as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{asset($product->image)}}" alt="{{$product->image}}">
                        </div>
                        <h2><a href="{{route('mobile.single',['id'=>$product->id])}}">{{$product->name}}</a></h2>
                        <div class="product-carousel-price">
                            <b>Price</b> <ins>Rs: {{$product->price}}</ins>
                        </div>  
                        <form action="{{route('cart.add')}}" class="cart" method="post">
                            {{csrf_field()}}                        
                        <div class="product-option-shop">
                        <div class="quantity">
                         <span><b>Qty: </b></span>   <input type="number" size="2" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                        </div>
                            <input type="hidden" name="p_id" value="{{$product->id}}">
                            <button class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{route('cart.add')}}">Add to cart</button>
                        </div>
                        </form>                       
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            {{ $prodp->links() }}
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection