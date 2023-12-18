@extends('layouts.master')
@section('content')
<div class="col-md-8">
    <div class="widget">
        <h3>Featured Product</h3>
        <div class="row">
               <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/products/'.'download.jpg')}}" alt="Card image">
                                <div class="card-body">
                                  <h4 class="card-title">Realme</h4>
                                  <p class="card-text">Tk -200</p>
                                  <a href="#" class="btn btn-outline-warning">Add to card</a>
                                </div>
                              </div>
                        </div>

                    </div>
                </div>
@endsection
