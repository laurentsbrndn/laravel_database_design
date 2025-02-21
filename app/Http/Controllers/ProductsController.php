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

        $products = MsProduct::latest()
            ->when(request('search'), function ($productQuery) {
                return $productQuery->where('product_name', 'like', '%' . request('search') . '%')
                    ->orWhere('product_description', 'like', '%' . request('search') . '%')
                        ->orWhereHas('msbrand', function ($brandQuery) {
                            $brandQuery->where('brand_name', 'like', '%' . request('search') . '%');
                });
            })->with(['msbrand', 'mscategory'])->get();

        return view('products.index', compact('products', 'customers'));
    }

    public function show($product_slug)
    {
        $product = MsProduct::where('product_slug', $product_slug)->firstOrFail();

        return view('product.index', compact('product'));
    }


}
