{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                new category
            </div>
            <div class="panel-footer">

                @include('errors.message')

                <!-- category id -->
                <div class="panel panel-info">
                    {{--<label>Info</label>--}}
                    <div class="col-lg-2">
                        <span>method</span><br>
                        <span>total</span><br>
                        <span>status</span><br>
                        <span>payment_id</span><br>
                        <span>created_at</span><br>
                        <span>updated_at</span><br>
                        <span>email</span><br>
                        <span>fullname</span><br>
                    </div>
                    <div class="col-lg-10">
                        <span>{{$order->method}}</span><br>
                        <span>{{$order->total}}</span><br>
                        <span>{{$order->status}}</span><br>
                        <span>{{$order->payment_id}}</span><br>
                        <span>{{$order->created_at}}</span><br>
                        <span>{{$order->updated_at}}</span><br>
                        <span>{{$order->email}}</span><br>
                        <span>{{$order->fullname}}</span><br>
                    </div>
                    .
                    <br>
                </div>

                {{--<hr>--}}
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


            </div>
        </div>
    </div>

@endsection

