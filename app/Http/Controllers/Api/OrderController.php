<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderMenuItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(OrderRequest $request)
    {
        $order = Order::query()->create([
            'user_id' => auth()->id(),
            'total' => 0
        ]);

        $total_amount = 0;

        foreach ($request->menu_items as $menu_item) {
            $item = MenuItem::query()->findOrFail($menu_item['menu_item_id']);
            $item_total_price = $item->price * $menu_item['quantity'];
            OrderMenuItem::query()->create([
                'menu_item_id' => $menu_item['menu_item_id'],
                'order_id' => $order->id,
                'quantity' => $menu_item['quantity'],
                'price' => $item->price,
                'total' => $item_total_price,
            ]);
            $total_amount += $item_total_price;
        }
        $order->update(['total' => $total_amount]);

        return "new OrderResource()";
    }


}
