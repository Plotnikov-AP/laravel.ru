<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestWork;
use App\Models\Product;
use App\Models\Slider;

class MainController extends Controller
{
    public function main() {
        CounterController::setAllCount();
        $sliders = Slider::orderBy('id')->get();
        return view('author', ['sliders'=>$sliders]);
    }

    public function pyatnashki() {
        return view('pyatnashki');
    }
    
    public function testWorks() {
        $testworks=TestWork::all();
        return view('testworks', ['testworks'=>$testworks]);
    }

    public function shop() {
        $products=Product::where('price', '>', 1)
        ->paginate(env('USER_COUNT_ON_PAGE'));
        return view('shop', ['products'=>$products]);
    }

    public function productId($id) {
        $product=Product::find($id);
        return view('productid', ['product'=>$product]);
    }
}
