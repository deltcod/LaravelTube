<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>LaravelTube</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="login-status" content="{{ Auth::check() }}">

    @if (Auth::user() != null)
        <meta name="api_token" content="{{ Auth::user()->apiKey->key }}">
        <meta name="user" content="{{ Auth::user()}}">
    @endif

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    {{--jQuery--}}
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

    {{--Fonts--}}
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    {{--VideoJS--}}
    <link rel="stylesheet" href="{{asset('/plugins/videojs/video-js.min.css') }}">
    <script src="{{ asset('/plugins/videojs/videojs-ie8.min.js') }}"></script>

</head>
<body>
    <app></app>

    <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/videojs/video.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/events.js') }}"></script>
</body>
</html>