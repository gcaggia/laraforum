@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('panel-title')</div>

                <div class="panel-body">
                    <h1>@yield('main-title')</h1>

                    @yield('main-content')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection