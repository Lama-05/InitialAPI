<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Category as ResourcesCategory;
use App\Http\Resources\CategoryWithProduct as ResourcesCategoryWithProduct;


class CategoryController extends BaseController
{
    public function getCategory(){
        $category = "Category haru xan";
        // return $this->sendSuccessResponse($category, "Category Fetched");      
        return $this->sendErrorResponse($category, "Error message!", 401);    
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->sendSuccessResponse(ResourcesCategory::collection($categories), 'Category Fetched!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_title' => ['required', 'unique:categories,category_title']
        ]);

        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors(), 'Validation Fail', 400);
        }

        $cateogry_title = $request->input('category_title');
        $slug = Str::slug($cateogry_title);
        $category_description = $request->input('category_description');

        $category = new Category;
        $category->category_title = $cateogry_title;
        $category->slug = $slug;
        $category->category_description = $category_description;

        $category->save();
        return $this->sendSuccessResponse(new ResourcesCategory($category), 'Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = Category::find($id);
        if (is_null($category)) {
            return $this->sendErrorResponse(['Category not found'], 'Category with this id doensont exists');
        }
        return $this->sendSuccessResponse(new ResourcesCategory($category), 'Category fetched Successfully!');

        //return response()->json("yeuta dekhauni dekhauni function");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_title' => ['required', 'unique:categories,category_title']
        ]);

        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors(), 'Validation Fail', 400);
        }

        $category = Category::find($id);

        if (is_null($category)) {
            return $this->sendErrorResponse(['category not found'], 'Category with this id doensont exists');
        }

        $category_title = $request->input('product_title');
        $slug = Str::slug($product_title);
        $category_descrition = $request->input('category_descrition');

        $category-> category_title = $category_title;
        $category-> slug = $slug;
        $category-> category_description = $category_descrition;

        $category->save();
        return $this->sendSuccessResponse(new ResourcesCategory($category), 'Category Edited Successfully!');

        //return response()->json("update dekhauni dekhauni function");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);
        if (is_null($category)) {
            return $this->sendErrorResponse(['Category not found'], 'Category with this id doensont exists');
        }

        $category->delete();
        return $this->sendSuccessResponse(['Done'], 'Category deleted successfully!');

        //return response()->json("delete dekhauni dekhauni function");
    }


    public function getCategoryWithProducts($id){
        $category = Category::find($id);

        if (is_null($category)) {
            return $this->sendErrorResponse(['category not found'], 'Category with this id doensont exists');
        }

        return $this->sendSuccessResponse(new ResourcesCategoryWithProduct($category), 'Category and product with thsi category found!');
    }

    public function getAllCategoryWithProducts(){
        $categories = Category::orderby('id', 'desc')->get();
        return $this->sendSuccessResponse(ResourcesCategoryWithProduct::collection($categories), 'Category and product with thsi category found!');
    }
}