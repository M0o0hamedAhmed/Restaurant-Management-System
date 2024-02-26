<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItemResource;
use App\Http\Resources\OrderResource;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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
    public function index(Request $request)
    {

        $this->data['orders'] = Order::query()->when($request->status,
            fn($query) => $query->where('status', $request->status)
        )->paginate(10);
        $this->data['status'] = $request->status;
        return view('admin.order.index', $this->data);
    }


    public function getProductsNotInOrder($order_id)
    {
        // Retrieve all menu items not in the given order
        $productsNotInOrder = MenuItem::whereDoesntHave('orders', function ($query) use ($order_id) {
            $query->where('order_id', $order_id);})->get();
        return MenuItemResource::collection($productsNotInOrder);
    }

    public function setNewItemInOrder(Request $request)
    {

        $menuItemId = $request->menu_item_id;
        $menuItem = MenuItem::findOrFail($menuItemId);
        Order::query()->findOrFail($request->order_id)->menu_items()->attach($menuItemId, ['quantity' => $request->quantity, 'price' => $menuItem->price, 'total' => $menuItem->price * $request->quantity,]);
        return response()->json(['order' => $menuItemId, 'request' => $request->all()]);
    }


    public function getItemFromOrder(){

        return response()->json(['x' =>'x']);
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
    public function show(Order $order)
    {

        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order.dataTables', compact('order'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order  = Order::query()->findOrFail($id)->update(['status' => 'complete']);
        return response()->json(['data' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
