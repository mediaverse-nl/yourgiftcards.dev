{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">

        <div class="panel panel-default">
            <div class="panel-body">
                Aantal Orders Per Maand
            </div>
            <div class="panel-footer">
                <div id="myfirstchart" style="height: 250px;"></div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                Stock Panel
            </div>
            <div class="panel-footer">

                @include('errors.message')

                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>total</th>
                            <th>status</th>
                            <th>date</th>
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

@push('script')
    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: {!! json_encode( \DB::table('order')
            ->select(
                DB::raw('MONTHNAME(updated_at) as month'),
                DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"),
                DB::raw('count(*) as orders')
            )
            ->groupBy('monthNum')
            ->get())  !!},
            // The name of the data record attribute that contains x-values.
            xkey: 'monthNum',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['orders'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['orders']
        });

        $(document).ready(function(){
            $('.table').DataTable();
        });
    </script>
@endpush

