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
              <h4>Products Management</h4></div>
            
            <div class="card-body">
                <a href="{{route('products.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add Products</a>
                <br><br>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category_id</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category_Id</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Update</th>
                    <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if($prod->count()>0)

                    @foreach($prod  as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->category_id}}</td>
                      <td>{{$product->price}}</td>
                      <td><img src="{{$product->image}}" alt="{{$product->image}}" width="100px" height="70px"></td>
                      <td>{{$product->detail}}</td>
                      <td>
                        <a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a> &nbsp; &nbsp;
                       </td>
                      <td>
                          <form action="{{route('products.destroy',['id'=>$product->id])}}" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                       </td>
                    </tr>
                     @endforeach

                     @else

                    <tr>
                      <th colspan="10" class="text-center">No Published Products</th>
                    </tr>

                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated  {{$product->created_at->diffForHumans()}}</div>
          </div>

@endsection
