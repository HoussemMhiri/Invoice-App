<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;



class ProductController extends Controller
{
    public function all_products()
    {
        $products = Product::orderBy('id', 'DESC')->get();

        return response()->json([
            'products' => $products
        ]);
    }
}
