<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderMenuItem;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(OrderRequest $request)
    {

        try {
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
            Log::info("Create Order: order created successfully with id {$order->id}  by user id" . Auth::id());
            return $this->sendResponse(OrderResource::make($order));
        } catch (\Exception $e) {
            Log::error("Create Order : system can not   Create Order for this error {$e->getMessage()}");
            return $this->sendError($e->getMessage());
        }


    }


}
