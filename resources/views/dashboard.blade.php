@extends('components.pages_layout')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="loggedIn">
                <h3>You're logged in!</h3>
                <a href="{{url('/')}}">Go back home ></a>
            </div>
        </div>
    </div>
@endsection
