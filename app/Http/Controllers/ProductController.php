<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProductDetail($id) {
        $product=Product::find($id);
        return [
            'id'=>$product->id,
            'name'=>$product->name,
            'photo'=>$product->photo,
            'price'=>$product->price,
            'description'=>$product->description,
            'on_sklad'=>$product->on_sklad,
        ];
    }
}
