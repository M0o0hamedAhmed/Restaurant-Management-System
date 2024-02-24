<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMenuItem extends Model
{
    use HasFactory;
    protected $table = 'order_menu_item';

    protected $fillable=[
        'id',
        'menu_item_id',
        'order_id',
        'quantity',
        'price',
        'total'
    ];
}
