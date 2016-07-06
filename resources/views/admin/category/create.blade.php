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
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                    </div>

                    <!-- description -->
                    <div class="form-group">
                        {!! Form::label('description', 'description', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'description']) !!}
                        </div>
                    </div>

                    <!-- levering -->
                    <div class="form-group">
                        {!! Form::label('levering', 'levering', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::textarea('levering', null, ['class' => 'form-control', 'placeholder' => 'levering']) !!}
                        </div>
                    </div>

                    <!-- instructions -->
                    <div class="form-group">
                        {!! Form::label('instructions', 'instructions', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::textarea('instructions', null, ['class' => 'form-control', 'placeholder' => 'instructions']) !!}
                        </div>
                    </div>

                    <!-- status -->
                    <div class="form-group">
                        {!! Form::label('status', 'status', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('status', array('on' => 'on', 'off' => 'off'), null, ['class' => 'form-control'] ) !!}
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

