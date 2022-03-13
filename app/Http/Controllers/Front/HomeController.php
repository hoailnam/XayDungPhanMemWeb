<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //
    public function index(){
        $products = Product::get();
        return view('front.index',compact('products'));
    }
}
