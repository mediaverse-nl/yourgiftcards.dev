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

                <fieldset>

                    <!-- category id -->
                    <div class="form-group">
                        <label>test</label>
                        <div class="col-lg-10">
                            <span>test 1</span>
                        </div>
                    </div>

                    @foreach($order->orderdetail as $item)
                        {{$item}}
                    @endforeach

                </fieldset>

            </div>
        </div>
    </div>

@endsection

