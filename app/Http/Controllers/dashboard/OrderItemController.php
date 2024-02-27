<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:view orders'])->only('index', 'show');
        $this->middleware(['can:edit orders'])->only('edit', 'update');
        $this->middleware(['can:create orders'])->only('create', 'store');
        $this->middleware(['can:delete orders'])->only('destroy');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderItemRequest $request, $id)
    {
        try {
            $order = Order::query()->findOrFail($request->order_id);
            if ($request->type == 'increase') {
                $order->menu_items()->updateExistingPivot($request->menu_item_id, ['quantity' => DB::raw('quantity + 1'), 'total' => DB::raw('total + price')]);
            } elseif ($request->type == 'decreases') {
                $order->menu_items()->updateExistingPivot($request->menu_item_id, ['quantity' => DB::raw('quantity - 1'), 'total' => DB::raw('total - price')]);
            } elseif ($request->type == 'delete') {
                $order->menu_items()->detach($request->menu_item_id);
            }
            Log::info("Update Order: Order updated successfully with id {$request->order_id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Update Order : system can not   update Order for this error {$e->getMessage()}");
            abort(500);
        }

        return (new OrderResource($order))->additional(['message' => 'success'])->response()->setStatusCode(Response::HTTP_CREATED);;
    }

}
