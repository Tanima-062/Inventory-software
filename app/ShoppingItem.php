<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingItem extends Model
{
    protected $fillable = ['shopping_id', 'item_id', 'created_at', 'updated_at'];

    public function shopping()
    {
        return $this->belongsTo('App\Shopping', 'shopping_id','id');
    }
    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id','id');
    }
}
