<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($validated['product_id']);
        $totalPrice = $product->price * $validated['quantity'];

        Order::create([
                          'customer_name' => $validated['customer_name'],
                          'status' => $validated['status'] ?? 'новый',
                          'comment' => $validated['comment'],
                          'product_id' => $validated['product_id'],
                          'quantity' => $validated['quantity'],
                          'total_price' => $totalPrice,
                      ]);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно добавлен.');
    }

    public function show(Order $order)
    {
        $order->load('product');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        // Возможность редактирования только статуса
        return view('orders.edit', compact('order'));
    }

    public function update(StoreOrderRequest $request, Order $order)
    {
        $order->status = $request->validated()['status'] ?? 'новый';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Статус заказа обновлён.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ удалён.');
    }
}
