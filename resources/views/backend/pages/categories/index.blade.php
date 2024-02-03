@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="card-header">
                Add Category
            </div>
            {{-- @include('backend.partials.messages') --}}
            @if(session('delete'))
            <div class="alert-danger" style="padding: 20px">{{session('delete')}}</div>
            @endif
            @if(session('success'))
            <div class="alert-success" style="padding: 20px">{{session('success')}}</div>
            @endif
            <div class="card-body">

                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Parent Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                             @foreach ($categories as $category)
                            <tr>

                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$category->name}}</td>

                            <td><img src="{{ asset('images/categories/'. $category->image)}}"></td>

                            {{-- category model er parent function nichi --}}
                            <td>
                            @if($category->parent == NULL)
                                Primary Category
                            @else
                                {{$category->parent->name}}
                            @endif
                            </td>
                            <td><a  class="btn btn-primary" href="{{route('admin.categories.edit', $category->id)}}">Edit</a>
                            <a class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal{{$category->id}}">Delete</td>
            <!-- Modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you want to delete the product?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('admin.categories.delete', $category->id)}}" method="post" >
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

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
            @endsection
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



