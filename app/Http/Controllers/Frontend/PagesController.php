<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class PagesController extends Controller
{
    public function index(){
        $products= Product::orderBy('id','desc')->simplePaginate(3);

        return view('frontend.pages.index',compact('products'));
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    public function search(Request $request){
        $search=$request->search;
        $products=Product::orWhere('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('price','like','%'.$search.'%')
        ->orWhere('quantity','like','%'.$search.'%')->paginate(9);

        return view('frontend.pages.products.search',compact('search','products'));
    }
}
