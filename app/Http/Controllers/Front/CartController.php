<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $products = Session::get('cart');

        return view('front.basket', ['products' => $products]);
    }


    public function addToCart(Request $request)
    {

        $product = Product::query()->with('images', 'translations')
            ->where('id', $request->input('product_id'))->first();


        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {

            $quantity = $cart[$product->id]['count'] + $request->product_qty;

            $cart[$product->id]['count'] = $quantity;

        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'title' => $product->getTitle(),
                'count' => $request->product_qty,
                'price' => $product->price,
                'old_price' => $product->old_price ?? '',
                'image' => $product->images->first()->image ?? '',
            ];
        }

        Session::put('cart', $cart);


        return response()->json('success');
    }

    public function minusProduct($id)
    {

        $cart = Session::get('cart');

        $quantity = $cart[$id]['count'] - 1;

        $cart[$id]['count'] = $quantity;

        Session::put('cart', $cart);

        return response()->json('success')->status(200);
    }

    public function plusProduct($id)
    {
        $cart = Session::get('cart');

        $quantity = $cart[$id]['count'] + 1;

        $cart[$id]['count'] = $quantity;

        Session::put('cart', $cart);

        return response()->json('success')->status(200);
    }

    public function deleteProduct($id)
    {
        $cart = Session::get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json('success delete')->status(200);
    }


}
