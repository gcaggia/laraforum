@extends('layouts.main')

<!-- Title of the page -->
@section('page-title', 'LaraForum - ' . $category->title)

<!-- Title of the panel -->
@section('panel-title', 'LaraForum')

<!-- Main title in the page -->
@section('main-title' , 'LaraForum - ' . $category->title)

@section('main-content')
    <p>{{ $category->description }}</p>
    <hr>
    <table class="table table-topics">
    	<thead>
    		<tr>
    			<th>Title</th>
    			<th>Posts</th>
    			<th>Last Message</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach ($category->topics as $topic)
		    	<tr>
		    		<td>
		    			<h3>
		    				<a href="{{ $category->title . '/' . $topic->id }}" 
					    	   class="">
					    		{{ $topic->title }}
					    	</a>
		    			</h3>
		    			<p>Created by <a href="#">User</a> - 02-13-2015 03:25 PM</p>
		    		</td>
		    		<td>10 Posts</td>
		    		<td><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></td>
		    	</tr>
	    	@endforeach
    	</tbody>
    </table>
@endsection

<!-- content of the page -->
<!-- @section('main-content')
    <p>{{ $category->description }}</p>
    <hr>
    <div class="list-group">
    	@foreach ($category->topics as $topic)
	    	<a href="{{ $category->title . '/' . $topic->id }}" 
	    	   class="list-group-item">
	    		{{ $topic->title }}
	    	</a>
	    @endforeach
    </div>
@endsection -->