<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreMenuItemRequest;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:view menuItems'])->only('index','show');
        $this->middleware(['can:edit menuItems'])->only('edit','update');
        $this->middleware(['can:create menuItems'])->only('create','store');
        $this->middleware(['can:delete menuItems'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->data['menu_items'] = MenuItem::query()->get();

        return view('admin.menu_item.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['categories']  = Category::query()->get();
        return view('admin.menu_item.create',$this->data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuItemRequest   $request)
    {

        $data = $request->validated();
        MenuItem::query()->create($data);
        return redirect()->route('menu_items.index');
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
    public function edit(MenuItem $menuItem)
    {
        $this->data['menu_item'] = $menuItem;
        $this->data['categories'] = Category::query()->get();

        return view('admin.menu_item.edit',$this->data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMenuItemRequest   $request, MenuItem $menuItem)
    {
        $data = $request->validated();
        $menuItem->update($data);
        return redirect()->route('menu_items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MenuItem::query()->whereKey($id)->delete();
        return redirect()->route('menu_items.index');

    }
}
