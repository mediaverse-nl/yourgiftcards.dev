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
                                            <label for="{{$value}}" class="control-label pay-lb col-ms-12 col-md-12 col-lg-12">
                                                <div class="image-payment pull-left">
                                                    {!! Form::radio('methods', $value, null, ['id' => $value, 'class' => 'method']) !!}
                                                    @foreach($mollie as $name)
                                                        {{--{{dd($name->description)}}--}}
                                                        @if($name->id == $value)
                                                            <img src="{{$name->image->normal}}">
                                                            {!! Form::label($value, $name->description, ['class' => 'control-label pay-lb']) !!}
                                                        @endif
                                                    @endforeach
                                                    @php
                                                        $pirce = Config::get('mollie.transaction_costs.'.$value.'.price');
                                                        $percentage =  Config::get('mollie.transaction_costs.'.$value.'.percentage');
                                                    @endphp
                                                </div>
                                                <div class="pricing pull-right ">
                                                    <small class="muted" style="line-height: 50px;">
                                                    @if($pirce != 0)
                                                        @lang('text.valuta_sign'){{$pirce}}
                                                        {{--{{number_format((Cart::subtotal() + $pirce) * $percentage + Cart::subtotal(),2 )}} --}}
            {{--                                            {{number_format((Cart::subtotal() + $item['price']) * $item['percentage'] + Cart::subtotal(),2 )}}--}}
                                                    @endif
                                                    @if($percentage != 0)
                                                        + {{number_format($percentage,2)}}%
                                                    @endif
                                                    </small>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>

                                    <style>
                                        input[type="radio"]{
                                            visibility:hidden;
                                        }
                                        input[type="radio"]:checked{
                                            visibility:hidden;
                                        }
                                    </style>
                                    <br>

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
                                    <td class="text-right">@lang('text.valuta_sign'){{number_format(Cart::subtotal() - $servicecosts, 2)}}</td>
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
            $('.pay-lb ').on('click', function(){
                $(".selected").removeClass('selected');
                $(this).addClass('selected');
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
        .pay-lb{
            height: 50px;
        }
        .pricing{

        }
        .image-payment{
            margin-left: -15px;
        }
        .selected{
            background: gray;
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