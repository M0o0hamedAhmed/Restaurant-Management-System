<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    protected $table = 'categories';
    protected $with=[];


    // relations
    public function menuItem(){
        return $this->hasMany(MenuItem::class);
    }

    public function latestMenuItem()
    {
        return $this->hasOne(MenuItem::class)->latestOfMany();
    }

    public function oldestMenuItem()
    {
        return $this->hasOne(MenuItem::class)->oldestOfMany();
    }

    public function lowestPriceMenuItem()
    {
        return $this->hasOne(MenuItem::class)->ofMany('price','min');
    }

}
