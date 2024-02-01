<div class="row">
    @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        {{-- 1tar beshi sobi upload kora jabe na 1ta product a --}}
                        @php
                            $i=1;
                        @endphp
                        {{-- 1st foreach theke $product r Product model theke images() function ta niye, $product->images likchi --}}
                        @foreach ($product->images as $image)
                        {{-- i er value 0 er boro hole image fetch korbe,then valu i-- hoye jabe mane 0 hoy jabe abaro --}}
                        @if($i >0)
                        {{-- ei image ta migration table er name theke fetch kore show koracchi --}}
                        <a href="{{route('products.show',$product->slug)}}">
                        <img style="height:180px"  class="card-img-top" src="{{asset('images/products/'.$image->image)}}" alt="{{$product->title}}">
                        </a>
                        @endif
                        @php $i--; @endphp

                        @endforeach
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{route('products.show',$product->slug)}}">{{$product->title}}</a>
                            </h4>
                            <p class="card-text">{{$product->price}}</p>
                          <a href="#" class="btn btn-outline-warning">Add to card</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
        <div class="mx-4 pagination">
            {{$products->links()}}
        </div>

