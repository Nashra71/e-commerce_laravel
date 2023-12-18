@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Add Product
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label >Quantity</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"name="title">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for=product>Product Image</label>
                        <input type="file" class="form-control" id="exampleInputEmail1"name="product_image">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>

                      <div class="form-group">
                        <label >Price</label>
                        <input type="number" class="form-control" id="exampleInputEmail1"name="title">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>

                    <button type="submit" class="btn btn-primary">Add Product</button>
                  </form>
            </div>
        </div>
    </div>
  </div>
  @endsection
