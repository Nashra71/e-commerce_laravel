<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
 public function index(){
return view('backend.pages.index');
 }
 public function manage_product(){
     $products= Product::orderBy('id','desc')->get();
     return view('backend.pages.products.index',compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.pages.products.edit',compact('product'));
    }


 public function create(){
     return view('backend.pages.products.create');
    }
     public function store(Request $request){
    //    $this->validate($request, ['title'=>'required|max:150']);
        $request->validate([
            'title'=>'required|max:150',
            'description'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
        ]);
        $product = new Product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;

        $product->slug= Str::slug($request->title);
        $product->category_id=1;
        $product->brand_id=1;
        $product->admin_id=1;
        $product->save();

        //  productImage Model insert image

        if(count($request->product_image)>0){
            foreach ($request->product_image??[] as $image){
            if($request->hasFile('product_image')){
                // $image=$request->file('product_image');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location=public_path('images/products/'.$img);
                Image::make($image)->save($location);

                $product_image= new ProductImage;
                $product_image->product_id=$product->id;
                $product_image->image=$img;
                $product_image->save();
            }
        }}
        return redirect()->route('backend.pages.products.index');
     }

// if($request->hasFile('product_image')){
    //     $image=$request->file('product_image');
    //     $img=time() .'.'. $image->getClientOriginalExtension();
//     $location= public_path('images/products/'.$img);
//     Image::make($image)->save($location);

//     $product_image= new ProductImage;
//     $product_image->product_id=$product->id;
//     $product_image->image=$img;
//     $product_image->save();
// }

public function update(Request $request,$id){
    //    $this->validate($request, ['title'=>'required|max:150']);
        $request->validate([
            'title'=>'required|max:150',
            'description'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
        ]);
        $product = Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;

        $product->slug= Str::slug($request->title);
        $product->category_id=1;
        $product->brand_id=1;
        $product->admin_id=1;
        $product->save();

        //  productImage Model insert image

        if(count($request->product_image)>0){
            foreach ($request->product_image??[] as $image){
            if($request->hasFile('product_image')){
                // $image=$request->file('product_image');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location=public_path('images/products/'.$img);
                Image::make($image)->save($location);

                $product_image= new ProductImage;
                $product_image->product_id=$product->id;
                $product_image->image=$img;
                $product_image->save();
            }
        }}
        return redirect()->route('backend.pages.products.index');
     }
    }
