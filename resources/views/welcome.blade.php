@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">LaraForum</div>

                <div class="panel-body">
                    <h1>Welcome on LaraForum</h1>

                    <ul>
                        @foreach($categories as $categorie)
                            <li><a href="#">{{$categorie->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
