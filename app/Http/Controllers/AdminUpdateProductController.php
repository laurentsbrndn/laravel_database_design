<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsProduct;
use App\Models\MsBrand;
use App\Models\MsCategory;

class AdminUpdateProductController extends Controller
{
    public function show($product_slug)
    {
        $products = MsProduct::where('product_slug', $product_slug)->first();

        if (!$products) {
            return redirect('/admin/productlist')->with('error', 'Product not found.');
        }

        $categories = MsCategory::all();
        $brands = MsBrand::all();

        return view('admin-product.index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }


    public function update (Request $request, $product_slug)
    {
        $products = MsProduct::where('product_slug', $product_slug)->first();

        if (!$products) {
            return redirect('/admin/productlist')->with('error', 'Product not found');
        }

        $validateData = $request->validate([
            'product_name' => 'nullable|max:199',
            'product_price' => 'nullable|numeric|min:1',
            'product_stock' =>'nullable|integer|min:1',
            'product_description' => 'nullable|max:65000',
            'product_slug' => 'nullable|max:199',
            'product_image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'brand_name' => 'nullable|max:199',
            'category_name' => 'nullable|max:199',
        ]);

        if (empty($request->product_name)) {
            return back()->withErrors(['product_name' => 'Product name cannot be empty.'])->withInput();
        }

        if (empty($request->product_price)) {
            return back()->withErrors(['product_price' => 'Product price cannot be empty.'])->withInput();
        }

        if (empty($request->product_description)) {
            return back()->withErrors(['product_description' => 'Product description cannot be empty.'])->withInput();
        }

        if (empty($request->product_stock)) {
            return back()->withErrors(['product_stock' => 'Product stock cannot be empty.'])->withInput();
        }

        if (empty($request->product_slug)) {
            return back()->withErrors(['product_slug' => 'Product name cannot be empty.'])->withInput();
        }

        if (empty($request->brand_name)) {
            return back()->withErrors(['brand_name' => 'Brand name cannot be empty.'])->withInput();
        }

        if (empty($request->category_name)) {
            return back()->withErrors(['category_name' => 'category name cannot be empty.'])->withInput();
        }

        if ($request->hasFile('product_image')) {
            if ($products->product_image) {
                Storage::delete('public/product_photos/' . $products->product_image);
            }
            $file = $request->file('product_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/product_photos', $fileName);
            $products->product_image = $fileName;
        }

        $products->product_name = $validateData['product_name'];
        $products->product_price = $validateData['product_price'];
        $products->product_stock = $validateData['product_stock'];
        $products->product_description = $validateData['product_description'];
        $products->product_slug = $validateData['product_slug'];

        $brands = MsBrand::where('brand_name', $request->brand_name)->first();
        $categories = MsCategory::where('category_name', $request->category_name)->first();

        if ($brands) {
            $products->brand_id = $brands->brand_id;
        }
        
        if ($categories) {
            $products->category_id = $categories->category_id;
        }

        $products->save();

        return redirect('/admin/productlist')->with('success', 'Product updated successfully');
    }
}
