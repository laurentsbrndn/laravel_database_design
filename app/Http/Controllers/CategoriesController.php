<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsCategory;
use App\Models\MsProduct;
use App\Models\MsCustomer;

class CategoriesController extends Controller
{
    // public function index(){

    //     $categories = MsCategory::all();
    //     return view('category.index', compact('categories'));
    // }
    
    // public function show($category_slug)
    // {
    //     $category = MsCategory::with('msproduct')->where('category_slug', $category_slug)->firstOrFail();

    //     return view('category.index', [
    //         'category' => $category,
    //         'products' => $category->msproduct
    //     ]);
    // }

    // public function index()
    // {
    //     $categories = MsCategory::all();
    //     $products = MsProduct::all();
    //     $customers = auth('customer')->user();
    //     return view('products.index', compact('categories', 'products', 'customers'));
    // }

    // public function filterByCategory($category_slug)
    // {
    //     $categories = MsCategory::all();
    //     $category = MsCategory::where('category_slug', $category_slug)->first();
    //     $customers = auth('customer')->user();

    //     if ($category) {
    //         $products = $category->msproduct;
    //     } else {
    //         $products = MsProduct::all();
    //     }

    //     return view('products.index', compact('categories', 'products', 'customers'));
    // }

    // public function index()
    // {
    //     $categories = MsCategory::all();
    //     $products = MsProduct::with(['msbrand', 'mscategory'])->get();
    //     $customers = auth('customer')->user();
    //     return view('products.index', compact('categories', 'products', 'customers'));
    // }
    
    // public function filterByCategory($category_slug)
    // {
    //     $categories = MsCategory::all(); // Tambahkan ini
    //     $category = MsCategory::where('category_slug', $category_slug)->first();
    
    //     if ($category) {
    //         $products = $category->msproduct()->with(['msbrand', 'mscategory'])->get();
    //     } else {
    //         // Jika category_slug tidak ditemukan, tampilkan semua produk
    //         $products = MsProduct::all();
    //     }
    
    //     $customers = auth('customer')->user(); // Tambahkan ini juga
    
    //     return view('products.index', compact('categories', 'products', 'customers'));
    // }

    public function index()
{
    $categories = MsCategory::all();
    $products = MsProduct::with(['msbrand', 'mscategory'])->get();
    $customers = auth('customer')->user();
    return view('products.index', compact('categories', 'products', 'customers'));
}

public function filterByCategory($category_slug)
{
    $categories = MsCategory::all();
    $category = MsCategory::where('category_slug', $category_slug)->first();
    
    if ($category) {
        $products = MsProduct::with(['msbrand', 'mscategory'])
            ->where('category_id', $category->category_id)
            ->get();
    } else {
        // Jika category_slug tidak ditemukan, tampilkan semua produk
        $products = MsProduct::with(['msbrand', 'mscategory'])->get();
    }

    $customers = auth('customer')->user();

    return view('products.index', compact('categories', 'products', 'customers'));
}


}
