<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\PickUpPoint;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->orderByDesc('created_at')->get();

        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {

        if ($order->order_type == 'entity') {
            return view('admin.orders.show-entity', [
                'order' => $order->load('products', 'products.product',
                    'products.product.translations',
                    'products.product.images',
                )]);
        }

        $pickUpPoint = PickUpPoint::query()->with('translations')->get();

        return view('admin.orders.show', [
            'order' => $order->load('products', 'products.product',
                'products.product.translations',
                'products.product.images',
            ), 'pickUpPoint' => $pickUpPoint]);
    }

    public function update(Order $order, Request $request)
    {

        $order->update([
            "delivery_type" => $request->input('delivery_type'),
            "pay_type" => $request->input('payment_type'),
            "order_status" => $request->input('order_status'),
            "order_pay_status" => $request->input('order_pay_status'),
        ]);

        return redirect()->route('admin.order.index')->with('success', 'Успешно обновлен !');

    }


}
