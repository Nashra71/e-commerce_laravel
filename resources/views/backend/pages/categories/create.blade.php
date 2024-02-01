@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Add Category
            </div>
            <div class="card-body">
                <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- {{method_field("put")}} --}}
                    {{-- @include('backend.partials.messages') --}}
                    
                    <div class="form-group">
                        <label >Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >

                        {{-- We can also show error this way,its nice to me --}}
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Parent Category</label>
                    <select class="form-control" name="parent_id">
                       @foreach ($main_categories as $cat)
                            <option value="{{$cat->id }}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    </div>

                        <div class="form-group">
                          <label for=product>Category Image</label>
                          <div class="row">
                          <div class="col-md-4">
                          <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
            </div>
        </div>
    </div>
  </div>
  @endsection
