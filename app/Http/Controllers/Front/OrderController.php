<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\PickUpPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {

    }

    public function createOrder()
    {

    }

    public function checkout(Request $request)
    {
        $pick_up_points = PickUpPoint::query()->with('translations')->get();

        $cart = Session::get('cart');

        $price = 0;
        foreach ($request->product_id as $product){
            $get_cart[] = $cart[(integer)$product];
            $overall_price = $cart[$product]['price'] * $cart[(integer)$product]['count'];
            $price += $overall_price;
        }


        return view('front.checkout-order', [
            'products' => collect($get_cart),
            'overall_price' => $price,
            'pick_up_points' => $pick_up_points
        ]);
    }

    public function checkoutEntity()
    {

        return view('front.entity-checkout-order');
    }



}
