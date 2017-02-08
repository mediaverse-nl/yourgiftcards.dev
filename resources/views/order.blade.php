{{--default layout from site--}}
@extends('layouts.default')

{{--content from the page--}}
@section('content')
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-body">

                       {{--{{dd($order->orderedProduct)}}--}}
                    @if($order->status === 'paid')
                        @foreach($order->orderedProduct as $item)
                            {{$item->productkey->key}}<br>
                        @endforeach
                    @else
                        Betaling is gefaald
                    @endif

                </div>

            </div>
        </div>

    </div>
@stop