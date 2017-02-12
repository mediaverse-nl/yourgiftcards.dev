{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                Category Panel <a href="{{route('admin.blog.create')}}" class="btn btn-primary btn-sm pull-right">new</a>
            </div>
            <div class="panel-footer">

                @include('errors.message')

                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>image</th>
                            <th>text</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                            <tr class="{{ 'deleted' == $blog->status ? 'danger' : ''}}{{ 'offline' == $blog->status ? 'warning' : ''}}">
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->title}}</td>
                                <td>
                                    <img height="50px;" src="\img\blog\{{ $blog->image }}">
                                </td>
                                <td>
                                  <p> {{ $blog->text }}{{ $blog->status }}</p>
                                </td>
                                <td style="width: 120px;">
                                    <a class="btn btn-info btn-sm" href="{{route('admin.blog.edit', $blog->id)}}">edit</a>
                                    {{ Form::open(['method' => 'DELETE', 'style' => 'width:50px; display: inline;', 'route' => ['admin.blog.destroy', $blog->id]]) }}
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


@push('script')
<script>
    $(document).ready(function(){
        $('.table').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>
@endpush


