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
        <div class="card-header text-center"><b>Add Category Details</b></div>
        <div class="card-body">
          <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
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
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Add Category</button>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection