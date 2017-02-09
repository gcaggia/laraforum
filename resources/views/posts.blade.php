@extends('layouts.app')

<!-- content of the page -->
@section('content')
	<section class="title-page">
		<div class="container">
			{!! Breadcrumbs::render('topic', $topic->category->slug, $topic->topic_slug) !!}
			<h1>{{ $topic->title }}</h1>
			<p>{{ $topic->description }}</p>
		</div>
	</section>

    <section class="posts-list">
    	<div class="container">
            @if (session('Post'))
                <div class="alert alert-success alert-dismissible" 
                     role="alert">
                    <button type="button" class="close" 
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    Your post has been added to the topic !
                </div>
            @elseif (session('Topic'))
                <div class="alert alert-success alert-dismissible" 
                     role="alert">
                    <button type="button" class="close" 
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    Your Topic has been created !
                </div>
            @endif
			<div class="pagination-post text-center">
				{{$posts->links()}}
			</div>
            {{-- Beginning  of display all posts --}}
	    	@foreach ($posts as $post)
	    		<div id="post_{{ $loop->iteration + $nbPostsBefore }}" 
                     class="row row-post 
                     @if(session('Post') && $loop->last)
                         {{ 'row-new-post' }}
                     @endif ">
	    			<div class="col-xs-3"> 
	    				<div class="wrapper-user">
	    					<div class="text-center">
	    						<a href="/user/{{ $post->user->username }}">
                                    <img class="img-user" 
                                     src="{{ $post->user->profil_image }}" 
                                     alt="" 
                                     height="100" width="100">
                                </a>
		    					<a href="/user/{{ $post->user->username }}">
                                    <p><strong>{{ $post->user->name }}</strong></p>
                                </a>
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
                                    <button class="btn btn-xs btn-info btn-quote" 
                                            id="post-quote-{{ $post->id }}">
                                    <i class="fa fa-quote-left"></i> Quote</button>
	    							<a class="post-number" href="#">
	    								#{{ $loop->iteration + $nbPostsBefore }}
	    							</a>
	    						</div>
	    						<div class="clearfix"></div>
	    					</div>
	    					<div class="post-text">
                                @if ($post->quote)
                                    <div class="post-text-quote">
                                        
                                        <span>Quote of </span>
                                        <strong><span>{{ $post->quote->user->name }} - </span></strong>
                                        <span>
                                            {{ 
                                                (new Carbon\Carbon($post->quote->created_at))
                                                     ->format('l jS \\of F Y h:i:s A')
                                            }}
                                        </span>
                                        <div class="text-quote-content">
                                            <i class="fa fa-quote-left"></i>&nbsp
                                            <span>{{ $post->quote->content }}</span>
                                        </div>
    
                                    </div>
                                @endif
	    						{{ $post->content }}
	    					</div>
	    				</div>
	    			</div>
	    		</div>
		    @endforeach
            {{-- End  of display all posts --}}
    		<div class="pagination-part text-center">
				{{$posts->links()}}
			</div>
    	</div>
    </section>
    <section class="post-answer">
    	<div class="container">
            @if (count($errors))
                <div class="alert alert-danger alert-dismissible" 
                     id="error_post" role="alert">
                    <button type="button" class="close" 
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <p>Error(s) :</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <hr>
            @endif
    		@if (Auth::guest())
                <div class="guest text-center">
                    <h4>You need to login or register to write a post</h4>
                    <a class="btn btn-success" href="{{ url('/login') }}">Login</a>
                    <a class="btn btn-primary" href="{{ url('/register') }}">Register</a>
                </div>
            @else
                <h3>Your post</h3>
                <div class="alert alert-warning alert-dismissible" 
                     id="quote_post" role="alert" style="display:none;">
                    <button type="button" class="close" onclick="unquote()" 
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <div>
                        <span>You quote the message of </span>
                        <strong><span id="quote-user">Username</span></strong>
                        <div>
                            <i class="fa fa-quote-left"></i>&nbsp
                            <span id="quote-message">Test</span>
                        </div>
                    </div>
                </div>
                <form action="{{url()->current()}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="postQuoteId" value="0">
                    <div class="form-group 
                        {{ count($errors) ? 'has-error' : ''}}">
                        <textarea name="post" id="post" cols="30" rows="10" 
                            class="form-control ">{{ old('post') }}</textarea>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            @endif
    	</div>
    </section>   
@endsection

@section('script')
    <script type="text/javascript" src="{!! asset('js/moment.min.js') !!}">
    </script>
    <script type="text/javascript" src="{!! asset('js/post.js') !!}">
    </script>
@endsection