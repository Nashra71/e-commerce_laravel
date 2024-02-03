<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use File;

class CategoryController extends Controller
{
   public function index(){
    $categories= Category::orderBy('id','desc')->get();
    return view('backend.pages.categories.index',compact('categories'));

   }
   public function create(){
    // jei category gulor parent id null oi gulo show kortechi...NULL ke '' er vetore rakhtei hobe
    $main_categories = Category::orderBy('name','desc')->where('parent_id','NULL')->get();
    return view('backend.pages.categories.create', compact('main_categories'));

   }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'nullable|image',

        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;

    //    easier method
        if($request->file('image')){
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location =public_path('images/categories/'.$img);
            Image::make($image)->save($location);
            $category->image=$img;
        }

        $category->save();
        session()->flash('success','A category has added successfully!');
        return redirect()->route('admin.categories');

   }

   public function edit($id){
    $category=Category::find($id);
    $main_categories = Category::orderBy('name','desc')->where('parent_id','NULL')->get();

    if(!is_null($category)){
        return view('backend.pages.categories.edit',compact('category','main_categories'));
    }else{
        return redirect()->route('admin.categories');
    }
   }
   public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'nullable|image',

        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;

    //    easier method
        if(($request->image)>0){
            //delete the old image from folder
            if(File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location =public_path('images/categories/'.$img);
            Image::make($image)->save($location);
            $category->image=$img;
        }

        $category->save();
        session()->flash('success','A category has added successfully!');
        return redirect()->route('admin.categories');

   }
    public function delete($id){
    $category=Category::find($id);

    if(!is_null($category)){
        // DELETE PARENT CATEGORY
        if($category->parent_id==NULL){
            // IF PARENT_ID NULL MEANS IT IS PARENT CATEGORY SO DELETE SUB CATEGORY
            $sub_categories = Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
            foreach($sub_categories as $sub){
                if(File::exists('images/categories/'.$sub->image)){
                    File::delete('images/categories/'.$sub->image);
                }
                $sub->delete();
            }
        }
        if(File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
        }

   }
   $category->delete();
   session()->flash('delete','Product has been deleted successfully!');
   return back();
//    return back()->with('success','Product has been deleted successfully!');
    }

}
