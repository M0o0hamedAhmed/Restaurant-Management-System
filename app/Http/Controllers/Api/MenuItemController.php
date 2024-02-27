<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuItemResource;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuItemController extends Controller
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
        return MenuItemResource::collection($menu_items)->additional(['message' => 'success','status' => true])->response()->setStatusCode(Response::HTTP_CREATED);;
    }
}
