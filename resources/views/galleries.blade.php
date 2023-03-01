@extends('components.pages_layout')
@section('title')
    Brock Photography's Gallery
@endsection
@section('content')
    <form method="get">
        <div id="contentGal">
            <div class="galleries">
                <div class="containerImg">
                    <div><img src="images/landscapes/gal_image.jpg" alt="Landscapes. " height="300" width="300" class="imgGallery"></div>
                    <a href="{{url('/landscapes')}}"><div class="overlay"><div class="imgText">Landscapes</div></div></a>
                </div>
            </div>
        </div>
        <div id="contentGal">
            <div class="galleries">
                <div class="containerImg">
                    <div><img src="images/food/DSC_0003.jpg" alt="Landscapes. " height="300" width="300" class="imgGallery"></div>
                    <a href="{{url('/landscapes')}}"><div class="overlay"><div class="imgText">Foods</div></div></a>
                </div>
            </div>
        </div>
    </form>
@endsection
