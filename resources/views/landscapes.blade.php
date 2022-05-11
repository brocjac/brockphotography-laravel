@extends('components.pages_layout')
@section('title')
    Brock Photography Landscapes
@endsection
@section('content')

    <div class="rowGal" id="photos"><div class="columnGal">

    @foreach($photos as $photo)

        @if($loop->even)
            </div><div class="columnGal">

        @endif
            <div class="image">
                <a href="data:image/jpeg;base64,{!! base64_encode($photo->LargeImgSrc) !!}" data-lightbox="mygallery">
                    <img src="data:image/jpeg;base64, {!! base64_encode($photo->LargeImgSrc) !!}" alt="{{$photo->Alt}}. " class="images" width="50px">
                </a><br>
                <a href="{{route('photo.show', $photo->id)}}" id="photo' {{$photo->PhotoId}} '" class="cartphoto">Learn More</a>
            </div>
    @endforeach
    <?php
    echo '</div></div>';
    ?>
            <div><a href="{{asset('photos/create')}}">Add Photo</a></div>
@endsection
