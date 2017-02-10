
@lang('mail.payment')

<table class="table-responsive table">
    <tr>
        <th> </th>
        <th> </th>
    </tr>
    @foreach($order->orderedProduct as $item)
        <tr>
            <td>
                <img class="img-responsive" height="70" src="\img\cardlayout\{{$item->productkey->product->category->layout}}">
            </td>
            <td>
                <h1>{{$item->productkey->product->name}}</h1>
                Code: {{$item->productkey->key}}<br><br>
            </td>
        </tr>
    @endforeach
</table>