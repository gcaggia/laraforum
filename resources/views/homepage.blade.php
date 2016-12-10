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
		            <div class="col-sm-6 col-md-4">
						<div class="panel panel-default">
							<div class="panel-body text-center">
								<img src="images/{{$categorie->title}}.jpg" 
								     class="img-responsive">
								<h2>{{ $loop->count }} - {{$categorie->title}}</h2>
							</div>
						</div>
					</div>
		        @endforeach
				
			</div> <!-- End row -->
		</div> <!-- End Container -->
	</section>
@endsection