<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function shoppingItems()
    {
        return $this->hasMany('App\ShoppingItem', 'item_id','id');
    }
}
