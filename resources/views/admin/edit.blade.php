@extends('layouts.backend')

@section('content')

    @if(count($errors)>0)

    <ul class="list-group">
      
        @foreach($errors->all() as $error)

        <li  class="list-group-item text-danger">
          {{$error}}
        </li>

        @endforeach

    </ul>
    @endif

      <div class="card card-register mx-auto mt-5">
        <div class="card-header text-center"><b>Update Product:: <b>{{$prod->name}}</b> Details</b></div>
        <div class="card-body">
          <form action="{{route('products.update',['id'=>$prod->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             {{method_field('PUT')}}
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$prod->name}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" value="{{$prod->price}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                <select name="category_id" id="category" class="form-control">
                  @foreach($categ as $category)

                  <option value="{{$category->id}}"            
                   @if(($prod->category->id==$category->id))
                    selected
                    @endif>{{$category->name}}</option>

                  @endforeach
                </select>              
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Details</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" cols="5" id="comment" name="description">{{$prod->detail}}</textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="image" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10 text-center">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Product</button>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection