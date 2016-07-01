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

                {!! Form::open(['route' => 'admin.category.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                <fieldset>

                    <!-- name -->
                    <div class="form-group">
                        {!! Form::label('name', 'name', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'category']) !!}
                        </div>
                    </div>

                    <!-- file -->
                    <div class="form-group">
                        {!! Form::label('thumbnail', 'thumbnail', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::file('thumbnail') !!}
                        </div>
                    </div>

                    <!-- file icon -->
                    <div class="form-group">
                        {!! Form::label('icon', 'icon', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::file('icon') !!}
                        </div>
                    </div>

                    <!-- file layout-->
                    <div class="form-group">
                        {!! Form::label('layout', 'layout', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::file('layout') !!}
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
    </div>

@endsection

