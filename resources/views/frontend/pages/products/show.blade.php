@extends('frontend.layouts.master')
@section('title')
{{$product->title}}
@endsection
@section('content')
<div class="col-md-8">

                    <div class="text-center" ><h3 >All Product</h3></div>

      <div class="widget">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @foreach ($product->images as $image)
                    <div class="carousel-item active">
                        <img src="{{asset('images/products/'.$image->image)}}" class="d-block w-100" alt="First slide">
                    </div>

                    @endforeach

                    {{-- @php $i=1; @endphp
                    @foreach ($product->images as $image)
                    <div class="carousel-item {{$i == 1 ? 'active': ''}}">
                        <img src="{{asset('images/products/'.$image->image)}}" class="d-block w-100" alt="First slide">
                    </div>
                      @php $i++ @endphp
                    @endforeach --}}

            </div>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
<div class="col-md-8">
    <div class="widget">
        <h3>{{$product->title}}</h3>
        <h3>{{$product->price}} taka </h3> <br>

        <span class="badge badge-primary">
        <h3>{{$product->quantity < 1 ? 'No item is available': $product->quantity.' item in stock'}}</h3>

        </span>
        <hr>
        <div class="product-description">
            {{$product->description}}
        </div>
    </div>

</div>

@endsection
