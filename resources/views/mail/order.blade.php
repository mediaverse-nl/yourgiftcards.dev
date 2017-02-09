
@lang('mail.order')

{{$payment}}

Bestelling Nr #{{$payment}}

<a href="https://www.mollie.com/paymentscreen/ideal/select-issuer/WqpQrfx2CQ"></a>
Uw heeft gekozen om te betalen met {{$payment->method}}

<table class="table-responsive table">
    <tr>
        <th> </th>
        <th>@lang('text.product')</th>
        <th>@lang('text.tag_amount')</th>
        <th>@lang('text.tag_price')</th>
    </tr>
    @foreach($order as $item)
        <tr>
            <td>
                <img style="width: 120px;" src="http://justgiftcards.nl/img/cardlayout/{{$item->options[0]->category->layout}}">
            </td>
            <td>
                {{$item->name}}<br>
                {{$item->options[0]->category->name}}
            </td>
            <td>{{$item->qty}}</td>
            <td>{{$item->options[0]->price - $item->options[0]->discount}}</td>
        </tr>
    @endforeach
</table>