<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];

    /**
     * Get the category that owns the menu item.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_menu_item','menu_item_id','order_id')->withPivot('id','quantity', 'price', 'total');
    }


}
