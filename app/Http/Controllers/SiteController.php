<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class SiteController extends Controller
{
    //
    public function getCategory()
    {
        return view('category');
    }

    public function PostAddCategory(Request $request)
    {
       // dd($request->category_title);
        $slug = Str::slug($request->category_title);
        $cat = New Category;
        $cat->category_title = $request->category_title;
        $cat->category_description = $request->category_description;
        $cat->slug = $slug;
        $cat->save();
        return redirect()->back()->with('Message','Category Add Successfully!!!');
    }

    public function getProduct()
    {
        return view('product');
    }

    public function PostAddProduct(Request $request)
    {
        $request->validate([
            'product_image'=>'image|mimes:jpg,png,jpeg|max:2048'
         ]);
      if($request->product_image){
         $uniquename= sha1(time());
         $togetuploadphotoextension=$request->product_image->getClientOriginalExtension();
         $fullname = $uniquename.'.'.$togetuploadphotoextension;
         $request->product_image->move('images/category',$fullname);
      }
      else {
         $fullname=Null;
      }

        $slug = Str::slug($request->product_title);
        $pro = New Product;
        $pro->product_title = $request->product_title;
        $pro->category_id = $request->category_id;
        $pro->product_description = $request->product_description;
        $pro->product_cost=$request->product_cost;
        $pro->slug = $slug;
        $pro->product_image = $fullname;
        $pro->save();
        return redirect()->back()->with('Message','Product Add Successfully!!!');
    }
}
