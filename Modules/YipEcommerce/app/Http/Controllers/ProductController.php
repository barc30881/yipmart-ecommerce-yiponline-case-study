<?php

namespace Modules\YipEcommerce\Http\Controllers;

use Illuminate\Http\Request;
use Modules\YipEcommerce\Models\Product;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('yip_ecommerce::products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('yip_ecommerce::products.show', compact('product'));
    }
}