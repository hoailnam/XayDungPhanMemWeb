<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show($id)
    {
        $product= Product::findOrFail($id);
        return view('front.shop.show',compact('product'));
    }
    public function index(Request $request){
        $perPage =$request->show ?? 3;
        $sortBy =$request->sort_by ?? 'price-ascending';
        $search = $request->search ?? '';
        $products = Product::where('name', 'like', '%' . $search . '%');
        switch($sortBy){
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            default:
                $products = $products->orderBy('price');

        }
        $products = $products->paginate($perPage);
        // $products = Product::paginate(6);


        return view('front.shop.index', compact('products'));
    }
}
