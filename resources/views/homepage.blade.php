@extends('layouts.app')

@section('content')
	<section class="title">
		<div class="container">
			<h1>Welcome on LaraForum</h1>
			<p>Forum on topics of tomorrow</p>
		</div>
	</section>
	<section class="categories">
		<div class="container">
			<div class="row">

				@foreach($categories as $categorie)

					@if ($loop->iteration%2==1)
						<div class="clearfix visible-sm-block"></div>
					@elseif($loop->iteration%4==0)
						<div class="clearfix visible-md-block"></div>
					@endif

		            <div class="col-sm-6 col-md-4">

		            	<div class="thumbnail">
		            		<a href="/{{$categorie->slug}}">
				            	<img src="images/{{$categorie->title}}.jpg">
				            </a>
							<div class="caption text-center">
								<h2>
									<a href="/{{$categorie->slug}}">
										{{$categorie->title}}
									</a>
								</h2>									
							</div>
				        </div>
					</div>

		        @endforeach
				
			</div> <!-- End row -->
		</div> <!-- End Container -->
	</section>
@endsection