<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products= Product::orderBy('id','desc')->Paginate(2);
                return view('frontend.pages.products.index')->with('products',$products);
            }
            public function show($slug){
                $product=Product::where('slug',$slug)->first();
                if(!is_null($product)){
                    return view('frontend.pages.products.show',compact('product'));
                }else{
                    session()->flash('error','Sorry! there is no product!');
                    return redirect()->route('product');
                }
//
                    }
}
