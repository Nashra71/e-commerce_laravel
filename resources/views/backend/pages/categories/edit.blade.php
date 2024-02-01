@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                Edit Product
            </div>
            <div class="card-body">
                <form action="{{route('admin.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- {{method_field("put")}} --}}
                    @if(session('success'))
                    <div class="alert-success">{{session('success')}}</div>
                    @endif
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$category->name}}" >

                        {{-- We can also show error this way,its nice to me --}}
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description (optional) </label>
                      <textarea name="description" rows="8" cols="80" class="form-control">{!! $category->description !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Select a Parent Category</label>
                    <select class="form-control" name="parent_id">
                       @foreach ($main_categories as $cat)
                            <option value="{{$cat->id }}"{{$cat->id==$category->parent_id ? 'selected': '' }}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                    </div>
                        <div class="form-group">
                          <label for=oldimage>Category Old Image</label>
                          <img src="{!! asset('images/categories/'.$category->image) !!}" width="100"><br>

                          <label for=newimage>Category New Image(optional)</label>
                          <input type="file" class="form-control" id="exampleInputEmail1"name="image">
                        </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                  </form>
            </div>
        </div>
    </div>
  </div>
  @endsection
