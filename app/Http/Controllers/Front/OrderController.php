<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\OrderProduct;
use App\Models\Admin\PickUpPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {

    }

    public function createOrder(Request $request)
    {

        $user = auth()->user()->id ?? '';
        $count = $request->input('count');
        $cart = Session::get('cart');

        $order = Order::query()->create([
            'order_type' => $request->input('order_type'),
            'pay_type' => $request->input('payment_type'),
            'delivery_type' => $request->input('delivery_type'),
            'pick_up_point_id' => $request->input('pick_up_point_id'),
            'user_id' => (integer)$user ?? '',
            'guest' => $request->input('guest'),
            'description' => $request->input('description'),
            'order_status' => 'new',
            'order_pay_status' => 'not_payed',
            'order_price' => $request->input('order_price'),

        ]);

        foreach ($request->products as $key => $item){

            OrderProduct::query()->create([
               'product_id' => $item,
                'order_id' => $order->id,
                'count' => $count[$key]
            ]);

            if (isset($cart[$item])) {
                unset($cart[$item]);
                session()->put('cart', $cart);
            }

        }

        return redirect('/');

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

    public function checkoutEntity(Request $request)
    {
        $cart = Session::get('cart');

        $price = 0;

        foreach ($request->product_id as $product){
            $get_cart[] = $cart[(integer)$product];
            $overall_price = $cart[$product]['price'] * $cart[(integer)$product]['count'];
            $price += $overall_price;
        }


        return view('front.entity-checkout-order',[
            'products' => collect($get_cart),
            'overall_price' => $price,
        ]);
    }





}
