<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuItemRequest;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MenuItemController extends Controller
{
    private $classView;
    public function __construct()
    {
        $this->classView = 'admin.menu_item.';
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

        $menu_items = MenuItem::query()->get();

        return view($this->classView.'index', compact('menu_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories  = Category::query()->get();
        return view($this->classView.'create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuItemRequest   $request)
    {

        $data = $request->validated();
        try {
            $menu_item = MenuItem::query()->create($data);
            Log::info("Create MenuItem: MenuItem created successfully with id {$menu_item->id} by user id ". Auth::id() . ' and  name is '. Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Create MenuItem : system can not   create MenuItem for this error {$e->getMessage()}");

            abort(500);
        }

        return redirect()->route('menu_items.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        $menu_item = $menuItem;
        $categories = Category::query()->get();

        return view($this->classView.'edit',compact('menu_item','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMenuItemRequest   $request, MenuItem $menuItem)
    {
        $data = $request->validated();
        try {
            $menuItem->update($data);
            Log::info("Update MenuItem: MenuItem updated successfully with id {$menuItem->id} by user id ". Auth::id() . ' and  name is '. Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Update MenuItem : system can not   Update MenuItem for this error {$e->getMessage()}");

            abort(500);
        }
        return redirect()->route('menu_items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            MenuItem::query()->whereId($id)->delete();
            Log::info("Delete MenuItem: MenuItem deleted successfully with id {$id} by user id ". Auth::id() . ' and  name is '. Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Delete MenuItem : system can not   Delete MenuItem for this error {$e->getMessage()}");
            abort(500);
        }

        return redirect()->route('menu_items.index');

    }
}
