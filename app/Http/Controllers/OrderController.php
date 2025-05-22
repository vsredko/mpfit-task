<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()
            ->with('status')
            ->paginate(6);

        return view('orders.index', [
            'orders' => $orders,
        ]);
    }

    public function create(): View
    {
        return view('orders.create', [
            'products' => Product::all(),
        ]);
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
       Order::create($request->orderAttributes());

       return redirect()->route('orders.index');
    }

    public function edit(Order $order): View
    {
        return view('orders.edit', [
            'order' => $order,
            'statuses' => Status::all(),
            'products' => Product::all(),
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->orderAttributes());

        return redirect()->route('orders.edit', $order->id);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index');
    }
}
