{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                Nieuwe Blog Post
            </div>
            <div class="panel-footer">

                @include('errors.message')

                {!! Form::open(['route' => 'admin.blog.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                <fieldset>

                    <!-- title -->
                    <div class="form-group">
                        {!! Form::label('title', 'title', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                        </div>
                    </div>

                    <!-- text -->
                    <div class="form-group">
                        {!! Form::label('text', 'text', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'text']) !!}
                        </div>
                    </div>

                    <!-- category id -->
                    <div class="form-group">
                        {!! Form::label('category_id', 'category_id', ['class' => 'col-lg-2 control-label' , 'style' => 'margin-bottom: 0px !important;']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('category_id', $companies, null, ['class' => 'selectpicker form-control'])  !!}
                        </div>
                    </div>

                    <!-- status -->
                    <div class="form-group">
                        {!! Form::label('status', 'status', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('status', array('live' => 'live', 'offline' => 'offline', 'deleted' => 'deleted'), null, ['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <!-- file image -->
                    <div class="form-group">
                        {!! Form::label('image', 'image', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::file('image') !!}
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

