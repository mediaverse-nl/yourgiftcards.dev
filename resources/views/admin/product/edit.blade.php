{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                Wijzig Product
            </div>
            <div class="panel-footer">

                @include('errors.message')

                {{--{{$product->productkey->where('status', 'sell')->count()}}--}}

                {!! Form::model($product, array('route' => array('admin.product.update', $product->id), 'class' => 'form-horizontal', 'method' => 'patch' )) !!}

                <fieldset>

                    <!-- name -->
                    <div class="form-group">
                        {!! Form::label('name', 'name', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'category']) !!}
                        </div>
                    </div>

                    <!-- category id -->
                    <div class="form-group">
                        {!! Form::label('category_id', 'category_id', ['class' => 'col-lg-2 control-label' , 'style' => 'margin-bottom: 0px !important;']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('category_id', $companies, null, ['class' => 'selectpicker'])  !!}
                        </div>
                    </div>

                    <!-- price -->
                    <div class="form-group">
                        {!! Form::label('price', 'price', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '10,95']) !!}
                        </div>
                    </div>

                    <!-- discount -->
                    <div class="form-group">
                        {!! Form::label('discount', 'discount', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('discount', null, ['class' => 'form-control', 'placeholder' => '0,45']) !!}
                        </div>
                    </div>

                    <!-- servicecosts -->
                    <div class="form-group">
                        {!! Form::label('servicecosts', 'servicecosts', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('servicecosts', null, ['class' => 'form-control', 'placeholder' => '1,95']) !!}
                        </div>
                    </div>

                    <!-- discount -->
                    <div class="form-group">
                        {!! Form::label('value', 'value', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'amount of the card']) !!}
                        </div>
                    </div>

                    <!-- status -->
                    <div class="form-group">
                        {!! Form::label('status', 'status', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('status', array('on' => 'on', 'off' => 'off'), null, ['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary pull-right'] ) !!}
                        </div>
                    </div>

                </fieldset>

                {!! Form::close()  !!}

            </div>
        </div>

        {{--<div>--}}
            {{--@foreach($product->productkey as $stock)--}}
                {{--{{$stock}}--}}
            {{--@endforeach--}}
        {{--</div>--}}

    </div>

@endsection

