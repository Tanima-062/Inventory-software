<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Item();
        $item->name = 'Watch'; 
        $item->save();

        $item = new Item();
        $item->name = 'Shirt'; 
        $item->save();

        $item = new Item();
        $item->name = 'Jewelry'; 
        $item->save();

        $item = new Item();
        $item->name = 'Book'; 
        $item->save();

        $item = new Item();
        $item->name = 'Mobile'; 
        $item->save();

        $item = new Item();
        $item->name = 'Laptop'; 
        $item->save();

        $item = new Item();
        $item->name = 'TV'; 
        $item->save();

        $item = new Item();
        $item->name = 'Bucket'; 
        $item->save();

        $item = new Item();
        $item->name = 'Saree'; 
        $item->save();
    }
}
