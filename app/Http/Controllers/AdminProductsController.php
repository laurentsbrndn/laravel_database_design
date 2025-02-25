<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsCategory;
use App\Models\MsProduct;
use App\Models\MsBrand;
use App\Models\MsCompany;
use App\Models\MsAdmin;
use Illuminate\Support\Facades\Auth;

class AdminProductsController extends Controller
{
    public function show($product_slug)
    {
        $product = MsProduct::where('product_slug', $product_slug)->firstOrFail();

        return view('admin-product.index', compact('product'));
    }

    public function index()
    {   
        $admins = Auth::guard('admin')->user();

        $products = MsProduct::latest()
            ->when(request('search'), function ($productQuery) {
                return $productQuery->where('product_name', 'like', '%' . request('search') . '%')
                    ->orWhere('product_description', 'like', '%' . request('search') . '%')
                        ->orWhereHas('msbrand', function ($brandQuery) {
                            $brandQuery->where('brand_name', 'like', '%' . request('search') . '%');
                });
            })->with(['msbrand', 'mscategory'])->get();

        return view('admin-products.index', compact('products', 'admins'));
    }
}
