<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'total',
        'status'
    ];


    //relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function menu_items()
    {
        return $this->belongsToMany(MenuItem::class, 'order_menu_item', 'order_id', 'menu_item_id')->withPivot('id','quantity', 'price', 'total');
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }


}
