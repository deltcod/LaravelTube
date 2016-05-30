@extends('layouts.app')

@section('htmlheader_title')
    Upload Video
@endsection

@section('customs_scripts')
    <script src="{{ asset('js/upload-video.js') }}"></script>
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10">
                <div id="response"></div>
                <form class="form-add-video" id="form-add-video" role="form" method="post" action="/api/videos">
                    <legend>Upload Video</legend>
                    <input type="hidden" name="_token" value="{{ Session::getToken() }}">
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
                        <div id="drop-zone">
                            Drop video here...
                            or click here..
                            <input type="file" class="form-control drop-zoneButton" name="video" id="video" >
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="upload-button" class="btn btn-lg btn-primary col-md-12">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection