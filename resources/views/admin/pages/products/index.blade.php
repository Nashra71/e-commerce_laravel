@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
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
                            <td><a  class="btn btn-secondary" href="{{route('admin.product.edit',$product->id)}}">Edit
                            <a type="submit"  class="btn btn-secondary " href="{{route('admin.product.delete',$product->id)}}">Delete</td>

                          </tr>
                        @endforeach


                    </tbody>
                  </table>

            </div>
        </div>
    </div>
  </div>
  @endsection
