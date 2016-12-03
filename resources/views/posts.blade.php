@extends('layouts.main')

<!-- Title of the page -->
@section('page-title', 'LaraForum - ' . $topic->category->title)

<!-- Title of the panel -->
@section('panel-title', 'LaraForum')

<!-- Main title in the page -->
@section('main-title' , 'LaraForum - ' . $topic->category->title)

<!-- content of the page -->
@section('main-content')
    <p>Topic : {{ $topic->title }}</p>
    <hr>
    <div class="list-group">
    	@foreach ($topic->posts as $post)
	    	<a href="#" class="list-group-item">
	    		{{ $post->content }}
	    	</a>
	    @endforeach
    </div>
@endsection