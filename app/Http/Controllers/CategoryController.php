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
}
