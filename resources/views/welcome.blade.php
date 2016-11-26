@extends('layouts.main')

<!-- Title of the page -->
@section('page-title', 'LaraForum - Home')

<!-- Title of the panel -->
@section('panel-title', 'LaraForum')

<!-- Main title in the page -->
@section('main-title' , 'Welcome on LaraForum')

<!-- content of the page -->
@section('main-content')
    <ul>
        @foreach($categories as $categorie)
            <li><a href="#">{{$categorie->title}}</a></li>
        @endforeach
    </ul>
@endsection
