@extends('layouts.app')

@section('htmlheader_title')
    Profile
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10">
                <div id="response"></div>
                <form class="form-update-user" id="form-update-user" role="form" method="post" action="/api/users/{{Auth::user()->id}}">
                    <legend>Profile</legend>
                    <input type="hidden" name="_token" value="{{ Session::getToken() }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="avatar">Select Avatar</label>
                        <div id="drop-zone">
                            Drop video here...
                            or click here..
                            <input type="file" class="form-control drop-zoneButton" name="avatar" id="avatar" >
                        </div><br />
                        <img src="{{Auth::user()->avatar}}" alt="" width="160" height="160">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-left"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
                        <button type="button" id="delete-account-button" class="btn btn-danger pull-right"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection