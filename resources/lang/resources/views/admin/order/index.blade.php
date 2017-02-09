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
                            <th>order</th>
                            <th>email</th>
                            <th>total</th>
                            <th>date</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->created_at}}</td>
                                <td style="width: 120px;">
                                    <a class="btn btn-info btn-sm" href="{{route('admin.order.show', $item->id)}}">show</a>
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.order.edit', $item->id)}}">edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

