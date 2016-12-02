@extends('layouts.main')

<!-- Title of the page -->
@section('page-title', 'LaraForum - ')

<!-- Title of the panel -->
@section('panel-title', 'LaraForum')

<!-- Main title in the page -->
@section('main-title' , 'LaraForum - ' . $category->title)

<!-- content of the page -->
@section('main-content')
    <p>{{ $category->description }}</p>
    <hr>
    <div class="list-group">
    	@foreach ($category->topics as $topic)
	    	<a href="#" class="list-group-item">
	    		{{ $topic->title }}
	    	</a>
	    @endforeach
    </div>
@endsection