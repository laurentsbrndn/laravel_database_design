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

    // public function show($category_name){
    //     $category = MsCategory::where('category_name', $category_name)->firstOrFail();
    //     $products = MsProduct::where('category_id', $category->id)->get();

    //     return view('category.index', compact('category', 'products'));
    // }
    public function show($category_name)
    {
        $category = MsCategory::with('msproduct')->where('category_name', $category_name)->firstOrFail();

        return view('category.index', [
            'category' => $category,
            'products' => $category->msproduct
        ]);
    }



}
