<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Image;
class AdminController extends Controller
{
 public function index(){
return view('admin.pages.index');
 }
 public function create(){
    return view('admin.pages.products.create');
     }
     public function store(Request $request){
        $product = new Product;
        $product->title->$request->title;
        $product->description->$request->description;
        $product->price->$request->price;
        $product->quantity->$request->quantity;

        $product->slug= Str::slug($request->title);
        $product->category_id=1;
        $product->brand_id=1;
        $product->admin_id=1;
        $product->save();

         //  productImage Model insert image
         if($request->hasFile('product_image')){
            $image=$request->file('product_image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location= public_path('images/products/'.$img);
            Image::make($image)->save($location);

            $product_image= new ProductImage;
            $product_image->product_id=$product->id;
            $product_image->image=$img;
            $product_image->save();


        return redirect()->route('admin.product.create');
         }


}
