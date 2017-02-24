{{--default layout from site--}}
@extends('layouts.default')

{{--@section('title', trans('t'))--}}
{{--@section('description', '')--}}
{{--@section('keywords', '')--}}

@push('mate-tags')
    <meta name="robots" content="noindex,nofollow">
@endpush

{{--content from the page--}}
@section('content')
    <div class="row">

        @include('errors.message')

        <div class="col-md-12 col-md-offset-1">
            <div class="row">

                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            @lang('text.products') <a href="{{route('cart.index')}}" class="pull-right" style="color: #F59D00">@lang('text.edit')</a>
                        </div>
                        <div class="panel-body">
                            <table class="table-responsive table">
                                <tr>
                                    <th> </th>
                                    <th>@lang('text.product')</th>
                                    <th>@lang('text.tag_amount')</th>
                                    <th>@lang('text.tag_price')</th>
                                </tr>
                                @foreach(Cart::content() as $item)
                                    <tr>
                                        <td>
                                            <img style="width: 120px;" src="/img/cardlayout/{{$item->options[0]->category->layout}}">
                                        </td>
                                        <td>
                                            {{$item->name}}<br>
                                            {{$item->options[0]->category->name}}
                                        </td>
                                        <td>x {{$item->qty}}</td>
                                        <td>{{number_format($item->options[0]->price - $item->options[0]->discount, 2)}}</td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="panel">
                        <div class="panel-heading">
                            @lang('text.delivery_adres')
                        </div>
                        <div class="panel-body">

                            {!! Form::open(['route' => 'order.create', 'class' => '', 'method' => 'POST']) !!}

                                <fieldset>
                                    <div class="form-group">
                                        {!! Form::label('fullname', trans('text.first_lastname'), ['class' => 'control-label']) !!}
                                        {!! Form::text('fullname', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
                                    </div>
                                    <!-- email -->
                                    <div class="form-group">
                                        {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email@justgiftcards.nl']) !!}
                                    </div>
                                    {!! Form::label('email', trans('text.tag_method'), ['class' => 'control-label']) !!}<br>

                                    <div class="row">
                                        @foreach(collect($mollie)->pluck('id', 'id') as $value => $item)
                                            @php
                                                $pirce = Config::get('mollie.transaction_costs.'.$value.'.price');
                                                $percentage =  Config::get('mollie.transaction_costs.'.$value.'.percentage');
                                            @endphp

                                            <label for="{{$value}}" class="control-label pay-lb col-ms-6 col-md-6 col-lg-6" style="margin-bottom: -10px;">
                                                <div class="thumbnail" style="border: 1px solid #ccc; border-radius: 5px; height: 70px !important;">
                                                    {!! Form::radio('methods', $value, null, ['id' => $value, 'class' => 'method']) !!}
                                                    @foreach($mollie as $name)
                                                        @if($name->id == $value)
                                                            <div style="margin-top: -25px;">
                                                                {!! Form::label($value, $name->description, ['class' => 'control-label']) !!}
                                                                <br>
                                                                <small class="muted" style="">
                                                                    @if($pirce != 0)
                                                                        @lang('text.valuta_sign'){{$pirce}}
                                                                    @endif
                                                                    @if($percentage != 0)
                                                                        + {{number_format($percentage,2)}}%
                                                                    @endif
                                                                </small>
                                                                <img class="pull-right" src="{{$name->image->normal}}" style="margin-top: -10px;">
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                    <!-- payment methods -->
                                    {{--<div class="form-group">--}}
                                        {{--{!! Form::label('methods', trans('text.tag_method'), ['class' => 'control-label']) !!}--}}
                                        {{--{!! Form::select('methods', collect($mollie)->pluck('id', 'id'), null, ['class' => 'form-control', 'dir' => 'rtl', 'placeholder' => '--- select ---']) !!}--}}
                                    {{--</div>--}}
                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        {!! Form::submit('Afrekenen', ['class' => 'btn btn-pay'] ) !!}
                                    </div>

                                </fieldset>

                            {!! Form::close()  !!}

                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <h2>@lang('text.order')</h2>
                            <br>
                            <table class="table">
                                <tr>
                                    <td ><b>@lang('text.tag_subtotal')</b></td>
                                    <td class="text-right" id="price-tag"> @lang('text.valuta_sign'){{number_format(Cart::subtotal() - $servicecosts, 2)}}</td>
                                </tr>
                                <tr>
                                    <td><b>@lang('text.tag_servicecosts')</b></td>
                                    <td class="text-right">@lang('text.valuta_sign'){{number_format($servicecosts, 2)}}</td>
                                </tr>
                                <tr style="font-size: 20px; font-weight: bold; ">
                                    <td ><b>@lang('text.tag_total')</b></td>
                                    <td class="text-right">@lang('text.valuta_sign'){{number_format(Cart::subtotal(), 2)}}</td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@push('javascript')
    <script>
        $(document).ready(function(){
            $('.pay-lb').on('click', function(){
                $(".selected").removeClass('selected');
                $(this).addClass('selected');
//                $('#price-tag').html();
            });
        });
//            $('.method').click(function(){
//                if() {
//                    $(this).addClass("selected");
//                } else {
//                    $(this).removeClass("selected");
//                }
//            });
//        });
    </script>
@endpush

@push('stylesheet')
    <style>

        input[type="radio"]{
            visibility:hidden;
        }
        input[type="radio"]:checked{
            visibility:hidden;
        }
        .pay-lb{
            /*height: 60px;*/
            /*border: 1px solid gray;*/
            /*!*float: left;*!*/
            /*position: relative;*/
            /*padding: 5px;*/
        }
        /*.pay-lb > p {*/
            /*position: absolute;*/
           /*width: 100px;*/
            /*top: 10px;*/
        /*}*/
        /*.image-payment {*/
            /*!*margin-top: -18px !important;*!*/
            /*top: 10px;*/
            /*width: 30px;*/
            /*!*float: left;*!*/
        /*}*/
        .pricing{

        }
        .image-payment{
            margin-left: -15px;
        }
        .selected > .thumbnail{
            background: #3D4E60 !important;
            opacity: 0.7;
            color: #fff;
        }

        .form-control{
            border-radius: 0px;
        }

        .panel{
            border-radius: 0px;
        }
        .panel-heading{
            background-color: #3D4E60;
            color: #fff;
        }
        .btn-pay{
            background-color: #FFA50A;
            color: #fff;
            border-radius: 0px;
            width: 100%;
        }
    </style>
@endpush