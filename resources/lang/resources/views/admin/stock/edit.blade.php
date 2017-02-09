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

                {!! Form::model($stock, array('route' => array('admin.stock.update', $stock->id), 'method' => 'patch')) !!}

                <fieldset>

                    <!-- Email -->
                    <div class="form-group">
                        {!! Form::label('key', 'key', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => 'category']) !!}
                        </div>
                    </div>

                    <!-- category id -->
                    <div class="form-group">
                        {!! Form::label('product_id', 'product_id', ['class' => 'col-lg-2 control-label' , 'style' => 'margin-bottom: 0px !important;']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('product_id', $companies, null, ['class' => 'selectpicker'])  !!}
                        </div>
                    </div>

                    <br>
                    <br>
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

    </div>

@endsection

