<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderMenuItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:view orders'])->only('index','show');
        $this->middleware(['can:edit orders'])->only('edit','update');
        $this->middleware(['can:create orders'])->only('create','store');
        $this->middleware(['can:delete orders'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {

        $x = OrderMenuItem::query()->findOrFail($id)->menu_items;
        return response()->json(['x' => $x]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderItemRequest $request,$id)
    {
        $order = Order::query()->findOrFail($request->order_id);
//        $menu_item_price = $order->where('menu_item_id', $request->menu_item_id)->first()->price;
        if ($request->type == 'increase') {
            $order->menu_items()->updateExistingPivot($request->menu_item_id,['quantity' => DB::raw('quantity + 1'),'total' => DB::raw('total + price')  ]);
        } elseif ($request->type == 'decreases') {
            $order->menu_items()->updateExistingPivot($request->menu_item_id,['quantity' => DB::raw('quantity - 1') ,'total' => DB::raw('total - price') ]);
        } elseif ($request->type == 'delete') {
            $order->menu_items()->detach($request->menu_item_id);
        }
        return (new OrderResource($order))->additional(['message' => 'success'])->response()->setStatusCode(Response::HTTP_CREATED);;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
