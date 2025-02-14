<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsCategory;
use App\Models\MsProduct;
use App\Models\MsBrand;
use App\Models\MsCompany;

class ProductsController extends Controller
{
    public function index()
    {
        $products = MsProduct::with(['msbrand', 'mscategory'])->get();

        return view('products.index', compact('products'));
    }
}
