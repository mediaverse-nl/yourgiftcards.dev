{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                Category Panel <a href="{{route('admin.category.create')}}" class="btn btn-primary btn-sm pull-right">new</a>
            </div>
            <div class="panel-footer">

                @include('errors.message')

                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>thumbnail</th>
                            <th>layout</th>
                            <th>icon</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <img height="50px;" src="\img\thumbnail\{{ $category->thumbnail }}">
                                </td>
                                <td>
                                    <img height="50px;" src="\img\cardlayout\{{ $category->layout }}">
                                </td>
                                <td>
                                    <img height="50px;" src="\img\icon\{{ $category->icon }}">
                                </td>
                                <td style="width: 120px;">
                                    <a class="btn btn-info btn-sm" href="{{route('admin.category.edit', $category->id)}}">edit</a>
                                    {{ Form::open(['method' => 'DELETE', 'style' => 'width:50px; display: inline;', 'route' => ['admin.category.destroy', $category->id]]) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

