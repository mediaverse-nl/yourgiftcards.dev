{{--default layout from site--}}
@extends('layouts.default')

{{--content from the page--}}
@section('content')
    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-info">
                <div class="panel-body">
                    @if($order->status === 'paid')
                        <h2>@lang('text.bedankt_title')</h2>
                        <p>
                            @lang('text.bedankt_aankoop')
                        </p>
                    @else
                        <h2>@lang('text.order_fail_title')</h2>
                        <div>
                            @lang('text.order_failed_description')
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-8">
        {{--{{dd($order->orderedProduct)}}--}}
                @if($order->status === \App\Http\Controllers\MollieController::STATUS_COMPLETED)
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
                @endif


        </div>

    </div>
@stop