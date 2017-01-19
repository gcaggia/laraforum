@extends('layouts.app')

@section('content')
	<section class="title-page">
		<div class="container">
            {!! Breadcrumbs::render('category', $category->slug) !!}
            <div class="row">
                <div class="col-sm-8">
                    <h1>{{ $category->title }}</h1>
                    <p>{{ $category->description }}</p>
                </div>
                <div class="col-sm-offset-2 col-sm-1">
                    <a href="{{ $category->slug }}/create" id="btn-category-add-topic" class="btn btn-info">New Topic</a>
                </div>
            </div>
		</div>
	</section>
    <hr>
    <div class="container">
        <div class="pagination-post text-center">
                {{ $topics->links() }}
        </div>
	    <table class="table table-topics">
        	<thead>
        		<tr>
        			<th>Title</th>
        			<th>Posts</th>
        			<th>Last Message</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach ($topics as $topic)
    		    	<tr>
    		    		<td>
    		    			<h3>
    		    				<a href="{{ $category->slug 
                                            . '/' . $topic->topic_slug }}" 
    					    	   class="">
    					    		{{ $topic->title }}
    					    	</a>
    		    			</h3>
    		    			<p>Created by <a href="#">{{ $topic->user->name }}</a> - <div class="">{{ $topic->created_at }}</div></p>
    		    		</td>
    		    		<td>{{ $topic->posts()->count() }} Posts</td>
    		    		<td>{{ $topic->posts()->orderBy('id', 'desc')->first()->content }} <br>by <a href="#">{{ $topic->posts()->orderBy('id', 'desc')->first()->user->name }}</a> - {{ $topic->posts()->orderBy('id', 'desc')->first()->created_at }}</td>
    		    	</tr>
    	    	@endforeach
        	</tbody>
	    </table>
        <div class="pagination-post text-center">
                {{ $topics->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{!! asset('js/moment.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/category.js') !!}"></script>
@endsection
