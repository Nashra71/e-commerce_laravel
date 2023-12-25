@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @include('admin.partials.messages')
        <div class="card">
            <div class="card-header">
                Add Product
            </div>
            <div class="card-body">

                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quentity</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                             @foreach ($products as $product)
                            <tr>

                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td><a  class="btn btn-primary" href="{{route('admin.product.edit', $product->id)}}">Edit</a>
                            <a class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal{{$product->id}}">Delete</td>
            <!-- Modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you want to delete the product?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('admin.product.delete', $product->id)}}" method="post" >
        @csrf
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>
      </div>
    </div>
  </div>


{{--


            <div class="modal fade" id="deleteModel{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"id="exampleModalLabel">Are you sure t delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.product.delete', $product->id)}}" method="post">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-secondary" >Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>

                </div>
                </div>
            </div> --}}
 </tr>
 @endforeach

</tbody>
</table>

                        </div>
                    </div>
                </div>
            </div>
            @endsection
