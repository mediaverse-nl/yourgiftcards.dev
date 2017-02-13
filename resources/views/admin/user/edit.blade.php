{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                edit nieuws
            </div>
            <div class="panel-footer">

                @include('errors.message')

                {!! Form::model($blog, array('route' => array('admin.blog.update', $blog->id), 'class' => 'form-horizontal', 'method' => 'patch', 'files' => true)) !!}

                <fieldset>

                    <!-- Email -->
                    <div class="form-group">
                        {!! Form::label('title', 'title', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                        </div>
                    </div>

                    <!-- description -->
                    <div class="form-group">
                        {!! Form::label('text', 'text', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'text']) !!}
                        </div>
                    </div>

                    <!-- status -->
                    <div class="form-group">
                        {!! Form::label('status', 'status', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::select('status', \App\Blog::lists('status', 'status'), null, ['class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <!-- thumbnail -->
                    <div class="form-group" style="margin: 50px 0px;">
                        {!! Form::label('image', 'image', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            <img height="200px;" src="\img\blog\{{ $blog->image }}">
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

