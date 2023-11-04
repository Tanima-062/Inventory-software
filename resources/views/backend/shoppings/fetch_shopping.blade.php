<table class="table table-responsive" id="userList">
    <thead>
        <tr>
            <th>SL No.<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="id"></i></th>
            <th>Amount<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="amount"></i></th>
            <th>Buyer<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="buyer"></i></th>
            <th>Receipt Id<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="receipt_id"></i></th>
            <th style="width:20%;">Items</th>
            <th>Buyer Email<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="buyer_email"></i></th>
            <th>Note<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="note"></i></th>
            <th>City<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="city"></i></th>
            <th>Phone No<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="phone"></i></th>
            <th>Entry By<i class='fas fa-exchange-alt custom-sorting' order="asc" coloumn="entry_by"></i></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($shoppings as $shopping)
        <tr>
            <td>{{empty($sort_id) ? ++$serial : $serial--}}</td>
            <td>{{$shopping['amount']}}</td>
            <td>{{$shopping->buyer}}</td>
            <td>{{$shopping->receipt_id}}</td>
            <td>
                @foreach($shopping->shoppingItems as $shopping_item)
                    <p>{{$shopping_item->item->name}}</p>
                @endforeach
            </td>
            <td>{{$shopping->buyer_email}}</td>
            <td style="break-word:word-break">{{$shopping->note}}</td>
            <td>{{$shopping->city}}</td>
            <td>{{$shopping->phone}}</td>
            <td>{{$shopping->entry_by}}</td>
            <td>
                
                <a class="Rectangle-Edit btn-hover2" style="text-decoration: none;" href="{{route('shoppings.show', $shopping->id)}}"><i class="fa fa-eye" style="margin-right: 5px;"></i>View</a>
            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="user-list-pagination" id="pageUser" style="margin-top:20px; margin-bottom:20px;">
        @if(count($shoppings) > 0)
            @if((($shoppings->currentPage()-1)*$shoppings->perPage())+$shoppings->perPage() < $shoppings->total())
                Showing from {{(($shoppings->currentPage()-1)*$shoppings->perPage())+1}} to {{(($shoppings->currentPage()-1)*$shoppings->perPage())+$shoppings->perPage()}} of {{$shoppings->total()}} 
            @else
                Showing from {{(($shoppings->currentPage()-1)*$shoppings->perPage())+1}} to {{$shoppings->total()}} of {{$shoppings->total()}} 
            @endif
        @else
            Showing from 0 to 0 of 0
        @endif        
            {{ $shoppings->links() }}
</div>
