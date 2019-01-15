@extends('layouts.frontend')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Mobiles Categories</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach($categ as $category)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="#"><img src="{{asset($category->image)}}" alt="{{$category->image}}"></a>
                        </div>
                        <h2><a href="{{route('category.single',['id'=>$category->id])}}">{{$category->name}}</a></h2>                       
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            {{ $categ->links() }}
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection