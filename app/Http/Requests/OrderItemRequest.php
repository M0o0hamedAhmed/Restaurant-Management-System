<?php

namespace App\Http\Requests;

use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_id' => 'required|exists:'.Order::getTableName().',id',
            'menu_item_id' => 'required|exists:'.MenuItem::getTableName().',id',
        ];
    }
}
