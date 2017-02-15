<!-- 2 column layout with 10px spacing -->
<table width="800" cellpadding="15" cellspacing="0" align="center" style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 20px;">
    <tr>
    <tr>
        <td width="800" height="150" bgcolor="#FFA50A">
            <center style="font-size: 60px;">
                Justgiftcards
            </center>
            <span>@lang('text.quote.fast_direct')!...</span>
        </td>
    <tr>
    <tr>
    <tr>
        <td width="600" height="200" bgcolor="">
            @lang('mail.dear') {{$order->fullname}},
            <br>
            <br>
            @lang('mail.payment_description')
            <br>
            <br>

            @lang('mail.order_id') <span style="font-weight: bold">#{{$order->id}}</span>

        </td>
    <tr>
    <tr>
        <td width="600">
            <table class="table-responsive table">
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
        </td>
    </tr>
    <tr>
        <td>
            @lang('mail.kind_regards')
            <br><br>
            Justgiftcards
            <br>
            <br>
        </td>
    </tr>
</table>

