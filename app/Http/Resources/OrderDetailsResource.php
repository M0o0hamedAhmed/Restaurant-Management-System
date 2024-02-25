<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->pivot->quantity,
            'price' => $this->price,
            'total' => $this->pivot->total,
            'action' => '<a  class="change_quantity btn btn-primary btn-sm"     data-type="increase" data-order-id="' . $this->pivot->order_id . '"  data-menu-item-id="' . $this->id . '" >+</a>
                            <a  class="change_quantity btn btn-primary btn-sm"     data-type="decreases" data-order-id="' . $this->pivot->order_id . '"  data-menu-item-id="' . $this->id . '" > - </a>
                            <a  class="change_quantity btn btn-danger btn-sm"  data-type="delete" data-order-id="' . $this->pivot->order_id . '" data-menu-item-id="' . $this->id . '" >Delete</a>'
        ];
    }
}
