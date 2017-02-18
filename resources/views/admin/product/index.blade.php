{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                Product Panel <a href="{{route('admin.product.create')}}" class="btn-xs btn btn-primary btn-sm pull-right">new</a>
            </div>
            <div class="panel-footer">

                @include('errors.message')

                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>category</th>
                            <th>name</th>
                            <th>price</th>
                            <th>discount</th>
                            <th>servicecosts</th>
                            <th>value</th>
                            <th>stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount}}</td>
                                <td>{{$product->servicecosts}}</td>
                                <td>{{$product->value}}</td>
                                <td>{{$stock->where('product_id', $product->id)->where('status', 'sell')->count()}}</td>
                                <td style="width: 120px;">
                                    <a class="btn btn-info btn-sm" href="{{route('admin.product.edit', $product->id)}}">edit</a>
                                    {{ Form::open(['method' => 'DELETE', 'style' => 'width:50px; display: inline;', 'route' => ['admin.product.destroy', $product->id]]) }}
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
            "order": [[ 3, "asc" ]]
        });
    });
</script>
@endpush


