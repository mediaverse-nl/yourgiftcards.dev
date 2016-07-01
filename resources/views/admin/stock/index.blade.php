{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                Stock Panel <a href="{{route('admin.stock.create')}}" class="btn btn-primary btn-sm pull-right">new</a>
            </div>
            <div class="panel-footer">

                @include('errors.message')

                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>product</th>
                            <th>key</th>
                            <th>copy</th>
                            <th>username</th>
                            <th>created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stock as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>{{str_limit($item->key, 10, '...')}}</td>
                                <td>{{$item->copy}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td style="width: 60px;">
                                    <a class="btn btn-info btn-sm" href="{{route('admin.stock.edit', $item->id)}}">edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

