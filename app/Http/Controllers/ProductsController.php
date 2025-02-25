<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsCategory;
use App\Models\MsProduct;
use App\Models\MsBrand;
use App\Models\MsCompany;
use App\Models\MsCustomer;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    // public function index()
    // {   
    //     $customers = Auth::guard('customer')->user();
    //     $categories = MsCategory::all();

    //     $products = MsProduct::latest()
    //         ->when(request('search'), function ($productQuery) {
    //             return $productQuery->where('product_name', 'like', '%' . request('search') . '%')
    //                 ->orWhere('product_description', 'like', '%' . request('search') . '%')
    //                     ->orWhereHas('msbrand', function ($brandQuery) {
    //                         $brandQuery->where('brand_name', 'like', '%' . request('search') . '%');
    //             });
    //         })->with(['msbrand', 'mscategory'])->get();

    //     return view('products.index', compact('products', 'customers', 'categories'));
    // }
    // public function index()
    // {
    //     $customers = Auth::guard('customer')->user();
    //     $categories = MsCategory::all();
    
    //     $products = MsProduct::latest()
    //         ->when(request('search') && !empty(request('search')), function ($productQuery) {
    //             return $productQuery->where('product_name', 'like', '%' . request('search') . '%')
    //                 ->orWhere('product_description', 'like', '%' . request('search') . '%')
    //                 ->orWhereHas('msbrand', function ($brandQuery) {
    //                     $brandQuery->where('brand_name', 'like', '%' . request('search') . '%');
    //                 });
    //         })
    //         ->with(['msbrand', 'mscategory'])->get();
    
    //     return view('products.index', compact('products', 'customers', 'categories'));
    // }



    // public function show($brand_slug, $product_slug)
    // {
    //     $categories = MsCategory::all();

    //     $brands = MsBrand::where('brand_slug', $brand_slug)->firstOrFail();
        
    //     $product = MsProduct::where('product_slug', $product_slug)->where('brand_id', $brands->brand_id)->with(['msbrand', 'mscategory'])->firstOrFail();

    //     return view('product.index', compact('product', 'categories', 'brands'));
    // }

    public function index()
{
    $customers = Auth::guard('customer')->user();
    $categories = MsCategory::all();
    
    $products = MsProduct::latest()
        ->when(request('search') && !empty(request('search')), function ($productQuery) {
            return $productQuery->where('product_name', 'like', '%' . request('search') . '%')
                ->orWhere('product_description', 'like', '%' . request('search') . '%')
                ->orWhereHas('msbrand', function ($brandQuery) {
                    $brandQuery->where('brand_name', 'like', '%' . request('search') . '%');
                });
        })
        ->with(['msbrand', 'mscategory']) // Menggunakan eager loading
        ->get();

    return view('products.index', compact('products', 'customers', 'categories'));
}

public function show($brand_slug, $product_slug)
{
    $categories = MsCategory::all();
    $brands = MsBrand::where('brand_slug', $brand_slug)->firstOrFail();
    $product = MsProduct::where('product_slug', $product_slug)
        ->where('brand_id', $brands->brand_id)
        ->with(['msbrand', 'mscategory']) // Menggunakan eager loading
        ->firstOrFail();

    return view('product.index', compact('product', 'categories', 'brands'));
}

}

