<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;

class BasketController extends Controller
{
    public function add($product_id) {
        $basket=new Basket();
        $basket->product_id=$product_id;
        $result=$basket->save();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function del() {

    }

    public function get() {
        $baskets=Basket::all();
        $result=array();
        foreach ($baskets as $basket) {
            $result[]=$basket->Product;
        }
        return $result;
    }

    public function count() {
        return Basket::all()->count();
    }

    public function show() {
        $products=$this->get();
        $table='<table class="table">';
        foreach ($products as $product) {
            $table.='<tr>';
            $table.='<td class="table_td">'.$product->name.'</td><td>'.$product->price.'</td>';
            $table.='</tr>';
        }
        $table.='</table>';
        // return $table;
        return view('basket', ['table'=>$table]);
    }
}
