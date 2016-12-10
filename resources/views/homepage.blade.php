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
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body text-center">
							<img src="images/science.jpg" class="img-responsive">
							<h2>Science</h2>
							
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="images/project2.jpg" class="img-responsive">
							<h3>PROJECT NAME</h3>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="images/project3.jpg" class="img-responsive">
							<h3>PROJECT NAME</h3>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur ex ea commodo.</p>
						</div>
					</div>
				</div>
			</div> <!-- End row -->
		</div> <!-- End Container -->
	</section>
@endsection