@extends('layouts.app')

@section('htmlheader_title')
    Analytics Likes/Dislikes
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <canvas id="likes-graph"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('customs_scripts')
    <script src="{{ asset('js/analytics-likes-dislikes.js') }}"></script>
@endsection