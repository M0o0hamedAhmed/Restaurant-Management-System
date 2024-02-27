<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItemResource;
use App\Http\Resources\OrderResource;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private $classView;

    public function __construct()
    {
        $this->classView = 'admin.order.';

        $this->middleware(['can:view orders'])->only('index', 'show');
        $this->middleware(['can:edit orders'])->only('edit', 'update');
        $this->middleware(['can:create orders'])->only('create', 'store');
        $this->middleware(['can:delete orders'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $orders = Order::query()->when($request->status,
            fn($query) => $query->where('status', $request->status)
        )->paginate(10);
        $status = $request->status;
        return view($this->classView . 'index', compact('orders', 'status'));
    }


    public function getProductsNotInOrder($order_id)
    {
        // Retrieve all menu items not in the given order
        $productsNotInOrder = MenuItem::whereDoesntHave('orders', function ($query) use ($order_id) {
            $query->where('order_id', $order_id);
        })->get();
        return MenuItemResource::collection($productsNotInOrder);
    }

    public function setNewItemInOrder(Request $request)
    {

        try {
            $menuItemId = $request->menu_item_id;
            $menuItem = MenuItem::findOrFail($menuItemId);
            Order::query()->findOrFail($request->order_id)->menu_items()->attach($menuItemId, ['quantity' => $request->quantity, 'price' => $menuItem->price, 'total' => $menuItem->price * $request->quantity,]);
            Log::info("Update Order: Order updated successfully with id {$request->order_id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Update Order : system can not  update Order for this error {$e->getMessage()}");
            abort(500);
        }
        return response()->json(['order' => $menuItemId, 'request' => $request->all()]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view($this->classView . 'dataTables', compact('order'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $order = Order::query()->findOrFail($id)->update(['status' => 'complete']);
            Log::info("Update Order: Order updated successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Update Order : system can not   update Order for this error {$e->getMessage()}");
            abort(500);
        }
        return response()->json(['data' => $order]);
    }

}
