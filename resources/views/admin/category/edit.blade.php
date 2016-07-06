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

                {!! Form::model($category, array('route' => array('admin.category.update', $category->id), 'class' => 'form-horizontal', 'method' => 'patch', 'files' => true)) !!}

                <fieldset>

                    <!-- Email -->
                    <div class="form-group">
                        {!! Form::label('name', 'name', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'category']) !!}
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
                            {!! Form::select('status', array('on', 'off'), null, ['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <!-- thumbnail -->
                    <div class="form-group" style="margin: 50px 0px;">
                        {!! Form::label('thumbnail', 'thumbnail', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            <img height="200px;" src="\img\thumbnail\{{ $category->thumbnail }}">
                            {!! Form::file('thumbnail') !!}
                        </div>
                    </div>

                    <!-- layout -->
                    <div class="form-group" style="margin: 50px 0px;">
                        {!! Form::label('layout', 'layout', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            <img height="200px;" class="img-responsive img-thumbnail" src="\img\cardlayout\{{ $category->layout }}">
                            {!! Form::file('layout') !!}
                        </div>
                    </div>

                    <!-- icon -->
                    <div class="form-group" style="margin: 50px 0px;">
                        {!! Form::label('icon', 'icon', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            <img height="50px;" src="\img\icon\{{ $category->icon }}">
                            {!! Form::file('icon') !!}
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

