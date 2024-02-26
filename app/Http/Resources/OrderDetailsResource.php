<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $actions = null;
        if (Auth::guard('web')->check()) {
            $actions = '<a  class="change_quantity btn btn-primary btn-sm"     data-type="increase" data-order-id="' . $this->pivot->order_id . '"  data-menu-item-id="' . $this->id . '" >+</a>
                            <a  class="change_quantity btn btn-primary btn-sm"     data-type="decreases" data-order-id="' . $this->pivot->order_id . '"  data-menu-item-id="' . $this->id . '" > - </a>
                            <a  class="change_quantity btn btn-danger btn-sm"  data-type="delete" data-order-id="' . $this->pivot->order_id . '" data-menu-item-id="' . $this->id . '" >Delete</a>';
        }

        return [
            'product_id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->pivot->quantity,
            'price' => $this->price,
            'total' => $this->pivot->total,
            'action' => $actions
        ];
    }
}
