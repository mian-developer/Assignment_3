@extends('layouts.backend')

@section('content')
@if(Session::has('success'))

<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>{{Session::get('success')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

@if(Session::has('danger'))

<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
  <strong>{{Session::get('danger')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

@if(Session::has('info'))

<div class="alert alert-info alert-dismissible fade show text-center" role="alert">
  <strong>{{Session::get('info')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif

<div class="card mb-3">
            <div class="card-header text-center">
              <i class="fas fa-table"></i>
              <h4>Categories Management</h4></div>
            
            <div class="card-body">
                <a href="{{route('categories.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add Category</a>
                <br><br>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if($categ->count()>0)

                    @foreach($categ  as $category)
                    <tr class="text-center">
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                      <td><img src="{{$category->image}}" alt="{{$category->image}}" width="100px" height="70px"></td>
                      <td>
                        <a href="{{route('categories.edit',['id'=>$category->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a> &nbsp; &nbsp;
                       </td>
                       <td>
                          <form action="{{route('categories.destroy',['id'=>$category->id])}}" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                       </td>
                    </tr>
                    @endforeach

                     @else

                    <tr>
                      <th colspan="5" class="text-center">No Published Category</th>
                    </tr>

                    @endif

                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated {{$category->created_at->diffForHumans()}}</div>
          </div>

@endsection
