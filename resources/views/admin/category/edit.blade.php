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
        <div class="card-header text-center"><b>Update Category : : <b>{{$categ->name}}</b> Details</b></div>
        <div class="card-body">
          <form action="{{route('categories.update',['id'=>$categ->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$categ->name}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="image" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image" value="{{$categ->image}}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10 text-center">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Category</button>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection