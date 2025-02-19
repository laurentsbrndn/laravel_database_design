<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsCategory;
use App\Models\MsProduct;

class CategoriesController extends Controller
{
    public function index(){

        $categories = MsCategory::all();
        return view('categories.index', compact('categories'));
    }
    
    public function show($category_slug)
    {
        $category = MsCategory::with('msproduct')->where('category_slug', $category_slug)->firstOrFail();

        return view('category.index', [
            'category' => $category,
            'products' => $category->msproduct
        ]);
    }



}
