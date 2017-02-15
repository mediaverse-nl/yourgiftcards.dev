
@php
    $servicecost = 1.50;
    $subtotal  = Cart::subtotal();
@endphp

<table width="800" cellpadding="15" cellspacing="0" align="center" style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px;">
    <tr>
        <td width="800" height="150" bgcolor="#FFA50A">
            <center style="font-size: 60px;">
                Justgiftcards
            </center>
            <span>@lang('text.quote.fast_direct')!...</span>
        </td>
    <tr>
    <tr>
        <td width="600" height="200" bgcolor="">
            @lang('mail.dear') {{$payment->fullname}},
            <br>
            <br>
            @lang('mail.order_text')
            <br>
            <br>
            <br>
            @lang('mail.kind_regards')
            <br>
            <br>
            Team Justgiftcards
            <br>
            <br>
            <br>
            @lang('mail.order_id') <span style="font-weight: bold">#{{$payment->id}}</span>
            <br>
            <br>
            @lang('mail.order.choice_of_payment') {{$payment->method}}.
            @if($payment->method == 'ideal')
                @lang('mail.payment_failed') <a href="https://www.mollie.com/paymentscreen/{{$payment->method}}/select-issuer/{{$payment->payment_id}}">@lang('button.here')</a>
            @endif
        </td>
    <tr>
    <tr>
        <td width="600">
            <table border="0" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
                @foreach($payment->orderedProduct as $item)
                    <tr>
                        <td>
                            <img class="img-responsive" height="90" src="\img\cardlayout\{{$item->productkey->product->category->layout}}">
                        </td>
                        <td>
                            <h1>{{$item->productkey->product->name}}</h1>
                            {{$item->productkey->product->category->name}}
                            <span style="float: right;">@lang('text.tag_price'): {{$item->productkey->product->price}}</span>

                        </td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="table-responsive table" style="margin-top: 20px;">
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
                    <td style="font-weight: bold">@lang('text.tag_total')</td>
                    <td>@lang('text.valuta_sign')</td>
                    <td style="font-weight: bold">{{number_format($subtotal, 2)}}</td>
                </tr>
            </table>
        </td>
    <tr>
    <tr>
        {{--<td width="800" height="200" bgcolor="gray">--}}
{{----}}
        {{--</td>--}}
    <tr>
</table>
