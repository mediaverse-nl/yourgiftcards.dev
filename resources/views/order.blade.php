{{--default layout from site--}}
@extends('layouts.default')

{{--content from the page--}}
@section('content')
    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-info">
                <div class="panel-body">
                    <h2>@lang('text.bedankt_title')</h2>
                    <p>
                        @lang('text.bedankt_aankoop')
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-8">
        {{--{{dd($order->orderedProduct)}}--}}
                @if($order->status === 'paid')
                    @foreach($order->orderedProduct as $item)
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <img class="img-responsive" src="\img\cardlayout\{{$item->productkey->product->category->layout}}">
                                </div>
                                <div class="col-md-8">
                                    <h1>{{$item->productkey->product->name}}</h1>
                                    Code: {{$item->productkey->key}}<br><br>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    Betaling is gefaald
                @endif


        </div>

    </div>
@stop