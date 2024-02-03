@extends('frontend.layouts.master')
@section('content')
<div class="col-md-8">
    <div class="widget">
        <h3>Searched Product for - 
            <span class="badge badge-primary">
            {{$search}} </h3>

            </span>

        @include('frontend.pages.products.product_partials.all_products')
                </div>

@endsection
