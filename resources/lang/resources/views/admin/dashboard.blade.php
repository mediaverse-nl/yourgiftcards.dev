{{--default layout from site--}}
@extends('layouts.admin')

{{--content from the page--}}
@section('content')

    @include('includes.admin_menu')

    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-body">
                Admin Panel
            </div>
            <div class="panel-footer">
                admin asdas
            </div>
        </div>
    </div>

@endsection

