<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct() {
        $products = Product::where('status', 1)->get();
        return Response::data($products);
    }
}
