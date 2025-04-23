<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    //

    public function CreateCategory (CategoryStoreRequest $request) {

        $data = $request->validated();

        Category::Create($data);

        return response()->json([
            'message' => 'Category Created succesfully!',
            'category' => $data
        ],201);

    }

    public function DeleteCategory ($id){

        $category = Category::FindOrFail($id);

        if(!$category->get()){
            return response()->json([
                'message' => 'Category not found!'
            ],404);

        }

        $category->delete();

        return response()->json([
            'message' => 'Category Deleted succesfully!'
        ],200);

    }
}
