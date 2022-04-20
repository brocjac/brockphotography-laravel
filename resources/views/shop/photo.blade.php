@extends('components.pages_layout')
@section('title')
    Brock Photography
@endsection
@section('content')
<div class="photoContainer">
    <div class="photoContainerImg">
    <img src="data:image/jpeg;base64, {!! base64_encode($photo->LargeImgSrc) !!}" alt="{{$photo->Alt}}. " class="imagesMoreInfo">
    </div>
    <div class="photoContent">
        <h1>{{$photo->Title}}</h1>
        <p>{{$photo->Alt}}</p>
        <p>Photo Value: ${{$photo->PhotoValuePrice}}</p>
        <?php
        print "<pre>";
        print_r($headers);
        print "</pre>";
        ?>
        @if(Route::has('login'))
            @auth
                <a href="{{route('photos.edit', $photo->id)}}" id="photo' {{$photo->id}} '" class="cartphoto">Edit</a>
                <form action="{{url('/photos', [$photo->id])}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete">
                </form>
            @endauth
            @else
        @endif
    </div>
</div>
@endsection
