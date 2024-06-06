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

    public function basket_show() {
        $products=$this->get();
        $table='<table class="table">';
        $summa=0;
        foreach ($products as $product) {
            $table.='<tr>';
            $table.='<td class="table_td">'.$product->name.'</td><td>'.$product->price.'</td>';
            $table.='</tr>';
            $summa+=$product->price;
        }
        $table.='</table>';
        $table.='<span class="basket_summa">Итоговая сумма покупок= '.$summa.' рублей</span>';
        // return $table;
        return view('basket', ['table'=>$table]);
    }
}
