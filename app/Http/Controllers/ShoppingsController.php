<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shopping;
use App\Item;
use Illuminate\Support\Facades\Session;
use DB;

class ShoppingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $shoppings = Shopping::orderBy('id','DESC')->paginate(10);
        $serial = $shoppings->perPage() * ($shoppings->currentPage() - 1);
        return view('backend.shoppings.list',compact('shoppings','serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('backend.shoppings.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'buyer' => 'required|max:20',
            'buyer_email' => 'required',
            'city' => 'required',
            'phone' => 'required|max:13|min:13',
            'entry_by' => 'required',
            'items' => 'required',
        ],[
            'amount.required' => 'Amount field is required',
            'buyer.required' => 'Buyer field is required',
            'buyer.max' => 'Buyer can not be more than 20 characters',
            'buyer_email.required' => 'Buyer email field is required',
            'city.required' => 'City field is required',
            'phone.required' => 'Phone field is required',
            'entry_by.required' => 'Entry by field is required',
            'items.required' => 'Please select a item',
        ]);
        if(Session::has('timer')){
            $timestamp = Session::get('timer');
            if((time() - $timestamp) > 86400){
                $shopping = new Shopping();
                $shopping->amount = $request->amount;
                $shopping->buyer = $request->buyer;
                $shopping->receipt_id = $request->receipt_id;
                $shopping->buyer_email = $request->buyer_email;
                $shopping->buyer_ip = Request::ip();
                $shopping->note = $request->note;
                $shopping->city = $request->city;
                $shopping->phone = $request->phone;
                $shopping->entry_by = $request->entry_by;
                $shopping->hash_key = hash('sha512', $receipt_id);
                $shopping->entry_at = date('Y-m-d');
                $shopping->save();

                $shopping_items = [];
                foreach($request->items as $item){
                    array_push($shopping_items,['shopping_id' => $shopping->id, 'item_id' => $item]);
                }
                DB::table('shopping_items')->insert($shopping_items);

                Session::put('timer', time());

                session()->flash('success','Data has been saved successfully!');
                return response()->json( array('success' => true));
            }else{
                session()->flash('error','You can not create shopping within 24 hours!');
                return response()->json( array('success' => false));
            }
            
        }else{
            $shopping = new Shopping();
            $shopping->amount = $request->amount;
            $shopping->buyer = $request->buyer;
            $shopping->receipt_id = $request->receipt_id;
            $shopping->buyer_email = $request->buyer_email;
            $shopping->buyer_ip = $request->ip();
            $shopping->note = $request->note;
            $shopping->city = $request->city;
            $shopping->phone = $request->phone;
            $shopping->entry_by = $request->entry_by;
            $shopping->hash_key = hash('sha512', $request->receipt_id);
            $shopping->entry_at = date('Y-m-d');
            $shopping->save();

            $shopping_items = [];
            foreach($request->items as $item){
                array_push($shopping_items,['shopping_id' => $shopping->id, 'item_id' => $item]);
            }
            DB::table('shopping_items')->insert($shopping_items);

            Session::put('timer', time());

            session()->flash('success','Data has been saved successfully!');
            return response()->json( array('success' => true));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shopping = Shopping::find($id);
        return view('backend.shoppings.view',compact('shopping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
       
        $shoppings = Shopping::orderBy('created_at', 'DESC')->paginate(10);
        if(isset($request->coloumn)){ 
            $shoppings = Shopping::orderBy($request->coloumn, $request->order)->paginate(10);

            if(($request->coloumn == 'id') && $request->order == 'asc'){
                $serial = $shoppings->total();
                if($shoppings->currentPage() > 1){
                    $serial = $shoppings->total() - (($shoppings->currentPage()-1) * $shoppings->perPage());
                }
                return response()->json( array('success' => true, 'view'=>view('backend.shoppings.fetch_shopping',['shoppings' => $shoppings,'serial' => $serial, 'sort_id' => 'asc'])->render()) );
            }
            
        }
        $serial = $shoppings->perPage() * ($shoppings->currentPage() - 1);   
        return response()->json( array('success' => true, 'view'=>view('backend.shoppings.fetch_shopping',['shoppings'=> $shoppings, 'serial' => $serial])->render()) );
        
    }
}
