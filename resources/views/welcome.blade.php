@extends('layouts.frontend')

@section('content')

    <div class="slider-area">
            <!-- Slider -->
            <div class="block-slider block-slider4">
                <ul class="" id="bxslider-home4">
                    @foreach($categorys as $prods)
                    <li>
                    <img src="{{asset($prods->image)}}" alt="{{$prods->image}}">
                        <div class="caption-group">
                            <h2 class="caption title">
                                 <span class="primary"><strong>{{$prods->name}}</strong></span>
                            </h2>
                            <h4 class="caption subtitle">{{$prods->price}}</h4>
                            <a class="caption button-radius" href="{{route('category.single',['id'=>$prods->id])}}"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
            <!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            @foreach($prod as $product)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{$product->image}}" alt="{{$product->image}}">
                                    <div class="product-hover">
                                        <a href="{{route('mobile.single',['id'=>$product->id])}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="{{route('mobile.single',['id'=>$product->id])}}">{{$product->name}}</a></h2>
                                
                                <div class="product-carousel-price">
                                    <b>Rs.</b> <ins>{{$product->price}}</ins>
                                </div> 
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            @foreach($categ as $category)
                            <a href="#"><img src="{{$category->image}}" alt="{{$category->image}}"></a>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    

@endsection