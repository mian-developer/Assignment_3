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

    @if(Session::has('success'))

    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{Session::get('success')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    @endif

      <div class="card card-register mx-auto mt-5">
        <div class="card-header text-center"><b>Update Profile Details</b></div>
        <div class="card-body">
          <form action="{{route('profile.update')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$user->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$user->email}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="{{$user->password}}">
              </div>
            </div>


            <div class="form-group row">
              <div class="col-sm-10 text-center">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Profile</button>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection