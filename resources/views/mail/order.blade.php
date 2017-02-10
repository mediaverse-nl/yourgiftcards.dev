
Beste {{$payment->fullname}},
<br>
<br>
@lang('mail.order_text')
<br>
<br>
<br>
@lang('mail.order_id') #{{$payment->id}}
<br>
<br>
@lang('mail.order.choice_of_payment') {{$payment->method}}.
@if($payment->method == 'ideal')
    @lang('mail.payment_failed') <a href="https://www.mollie.com/paymentscreen/{{$payment->method}}/select-issuer/{{$payment->payment_id}}">@lang('button.here')</a>
@endif
<br>
<br>

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
                <img height="70" src="http://justgiftcards.nl/img/cardlayout/{{$item->options[0]->category->layout}}">
            </td>
            <td>
                {{$item->name}}<br><br>
                <span style="font-size: 10px;">{{$item->options[0]->category->name}}</span>
            </td>
            <td>{{$item->qty}}</td>
            <td>{{$item->options[0]->price - $item->options[0]->discount}}</td>
        </tr>
    @endforeach
</table>

<br>
<br>

<table class="table-responsive table">
    <tr>
        <td>@lang('text.tag_servicecosts')</td>
        <td>@lang('text.valuta_sign')</td>
        <td>{{number_format($subtotal - $servicecost, 2)}}</td>
    </tr>
    <tr>
        <td>@lang('text.tag_subtotal')</td>
        <td>@lang('text.valuta_sign')</td>
        <td>{{number_format($servicecost, 2)}}</td>
    </tr>
    <tr>
        <td>@lang('text.tag_total')</td>
        <td>@lang('text.valuta_sign')</td>
        <td>{{number_format($subtotal, 2)}}</td>
    </tr>
</table>

