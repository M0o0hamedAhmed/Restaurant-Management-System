<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MenuItemResource;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends BaseController
{

    public function index(Request $request)
    {

        $menu_items = MenuItem::query()
            ->when($request->category_id,
                fn($query) => $query->where('category_id', $request->category_id))
            ->when($request->lowest_price,
                fn($query) => $query->orderBy('price'),
                fn($query) => $query->orderBy('price', 'DESC'))
            ->get();
        return $this->sendResponse(MenuItemResource::collection($menu_items));
    }
}
