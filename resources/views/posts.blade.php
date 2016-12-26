@extends('layouts.app')

<!-- content of the page -->
@section('content')
	<section class="title-page">
		<div class="container">
			<h1>{{ $topic->title }}</h1>
			<p>{{ $topic->description }}</p>
		</div>
	</section>

    <section>
    	<div class="container">

	    	@foreach ($topic->posts as $post)
	    		<div class="row row-post">
	    			<div class="col-xs-3">
	    				<div class="wrapper-user">
	    					<div class="text-center">
	    						<img class="img-user" 
	    						     src="{{ $post->user->profil_image }}" 
	    						     alt="" 
	    					 		 height="100" width="100">
		    					<p><strong>{{ $post->user->name }}</strong></p>
	    					</div>
		    				<p>Member since : 
		    					{{ 
		    						(new Carbon\Carbon($post->user->created_at))
		    						     ->toFormattedDateString()
		    					}}
		    				</p>
		    				<p>Number of messages : 
								<span>{{ $post->user->posts->count() }}</span>
		    				</p>
	    				</div>
	    			</div>
	    			<div class="col-xs-9">
	    				<div class="wrapper-post-content">
	    					<div class="post-metadata">
	    						<div class="pull-left">
	    							{{ 
			    						(new Carbon\Carbon($post->created_at))
			    						     ->format('l jS \\of F Y h:i:s A')
			    					}}
	    						</div>
	    						<div class="pull-right">
	    							<a href="#">#{{ $loop->iteration }}</a>
	    						</div>
	    						<div class="clearfix"></div>
	    					</div>
	    					<div class="post-text">
	    						{{ $post->content }}
	    					</div>
	    				</div>
	    			</div>
	    		</div>
		    @endforeach
    		
    	</div>
    </section>   
@endsection