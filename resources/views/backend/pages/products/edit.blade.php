@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Edit Product
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- {{method_field("put")}} --}}
                    @include('admin.partials.messages')
                    <div class="form-group">
                        <label >Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$product->title}}" >

                        {{-- We can also show error this way,its nice to me --}}
                                @error('title')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label >Quantity</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"name="quantity" value="{{$product->quality}}">
                      </div>

                      <div class="form-group">
                          <label >Price</label>
                          <input type="number" class="form-control" id="exampleInputEmail1"name="price" value="{{$product->price}}">
                        </div>

                        <div class="form-group">
                          <label for=product>Product Image</label>
                          <div class="row">
                          <div class="col-md-4">
                          <input type="file" class="form-control" id="exampleInputEmail1"name="product_image[]">
                        </div>
                        <div class="col-md-4">
                            <input type="file" class="form-control" id="exampleInputEmail1"name="product_image[]">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" id="exampleInputEmail1"name="product_image[]">
                          </div>
                          <div class="col-md-4">
                            <input type="file" class="form-control" id="exampleInputEmail1"name="product_image[]">
                          </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                  </form>
            </div>
        </div>
    </div>
  </div>
  @endsection
