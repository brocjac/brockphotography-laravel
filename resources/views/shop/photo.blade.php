@extends('components.pages_layout')
@section('title')
    Brock Photography
@endsection
@section('content')
<div>
    <img src="data:image/jpeg;base64, {!! base64_encode($photo->ImgSrc) !!}" alt="{{$photo->Alt}}. " class="images">
    <h1>{{$photo->Title}}</h1>
    <p>{{$photo->Alt}}</p>
    <p>Photo Value: ${{$photo->PhotoValuePrice}}</p>
    @if(Route::has('login'))
        @auth
            <a href="{{route('photos.edit', $photo->id)}}" id="photo' {{$photo->id}} '" class="cartphoto">Edit</a>
            <form action="{{url('/photos', [$photo->id])}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" name="submit" value="Delete">
            </form>
        @endauth
        @else
    @endif
</div>
@endsection
