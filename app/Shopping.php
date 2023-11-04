<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    public function shoppingItems()
    {
        return $this->hasMany('App\ShoppingItem', 'shopping_id','id');
    }

    public static function itemNameConcate($shopping_items){
        $item = '';
        foreach($shopping_items as $key=>$shopping_item){
            if($key == count($shopping_items)-1 ){
                $item .= $shopping_item->item->name;
            }else{
                $item .= $shopping_item->item->name . ', ';
            }
        }
        return $item;
    }
}
