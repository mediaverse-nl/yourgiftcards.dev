{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">

        <div class="panel panel-default">
            <div class="panel-body">
                Stock Over View
            </div>
            <div class="panel-footer">

                <div id="bar-chart" style="height: 250px;"></div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                Stock Panel <a href="{{route('admin.stock.create')}}" class="btn-xs btn-primary btn-sm pull-right">add to stock</a>
            </div>
            <div class="panel-footer">

                @include('errors.message')
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>product</th>
                            <th>key</th>
                            {{--<th>copy</th>--}}
                            <th>status</th>
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
                                {{--<td>{{$item->copy}}</td>--}}
                                <td>{{$item->status}}</td>
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

@push('script')


    <script>
        Morris.Bar({
            element: 'bar-chart',
            data: {!! json_encode(\Illuminate\Support\Facades\DB::table('productkey')
                    ->join('product', 'productkey.product_id', '=', 'product.id')
                    ->join('category', 'product.category_id', '=', 'category.id')
                    ->groupBy('category.name')
                    ->orderBy('product_id', 'ASC')
                    ->where('productkey.status', 'sell')
                    ->get([
                      \Illuminate\Support\Facades\DB::raw('COUNT(*) as value'),
                      \Illuminate\Support\Facades\DB::raw('category.name as label')
                    ])) !!},
            xkey: 'label',
            ykeys: ['value'],
            labels: ['value']
        });
        $(document).ready(function(){
            $('.table').DataTable({
                "order": [[ 3, "asc" ]]
            });
        });
    </script>
@endpush

