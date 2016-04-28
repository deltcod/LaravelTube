@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					{!! Form::open(
    					array(
        					'url' => 'api/videos?X-Authorization='.Auth::user()->apiKey->key,
        					'method' => 'post',
        					'class' => 'form',
        					'novalidate' => 'novalidate',
        					'files' => true)) !!}
					<legend>Upload Video</legend>
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
						<button type="submit" class="btn btn-primary">Upload</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection