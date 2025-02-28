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

    public function index()
    {   
        $customers = Auth::guard('customer')->user();
        $categories = MsCategory::all();

        $products = MsProduct::latest()
            ->filter(request(['search', 'category']))
            ->with(['msbrand', 'mscategory'])->get();

        return view('products.index', compact('products', 'categories', 'customers'));
    }

    public function show($brand_slug, $product_slug)
    {
        $categories = MsCategory::all();
        $brands = MsBrand::where('brand_slug', $brand_slug)->firstOrFail();
        $product = MsProduct::where('product_slug', $product_slug)
            ->where('brand_id', $brands->brand_id)
            ->with(['msbrand', 'mscategory']) 
            ->firstOrFail();

        return view('product.index', compact('product', 'categories', 'brands'));
    }

}

