@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

<style>
	.glyphicon-refresh-animate {
		-animation: spin .7s infinite linear;
		-webkit-animation: spin2 .7s infinite linear;
	}

	@-webkit-keyframes spin2 {
		from { -webkit-transform: rotate(0deg);}
		to { -webkit-transform: rotate(360deg);}
	}

	@keyframes spin {
		from { transform: scale(1) rotate(0deg);}
		to { transform: scale(1) rotate(360deg);}
	}
</style>

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12" id="response"></div>
				<form class="form-add-video" id="form-add-video" role="form" method="post" action="/api/videos">
					<legend>Upload Video</legend>
					<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
					<input type="hidden" id="api_token" name="_api_token" content="{{ Auth::user()->apiKey->key }}" />
					<div class="form-group">
						<label for="name"></label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Name">
					</div>

					<div class="form-group">
						<label for="category">Select Category</label>
						<select class="form-control" name="category" id="category">
							<option>Movie</option>
							<option>Music</option>
							<option>Sport</option>
							<option>Games</option>
							<option>Other</option>
						</select>
					</div>

					<div class="form-group">
						<label class="control-label" for="video">Select Video</label>
						<input type="file" class="form-control" name="video" id="video" >
					</div>

					<div class="form-group">
						<button type="submit" id="upload-button" class="btn btn-lg btn-primary col-md-12">Upload</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection