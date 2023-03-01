@extends('components.pages_layout')
@section('title')
    Brock Photography
@endsection
@section('content')
<div class="photoContainer">
    <div class="photoContainerImg">
    <img src="data:image/jpeg;base64, {!! base64_encode($photo->imageLarge) !!}" alt="{{$photo->description}}. " class="imagesMoreInfo">
    </div>
    <div class="photoContent">
        <h1>{{$photo->name}}</h1>
        <p>{{$photo->description}}</p>
        <p>Photo Value: ${{$photo->price}}</p>
        <form action="{{route('cart.store')}}" method="post">
            @csrf
            <label for="quantity">Qty: <input type="number"  name="quantity" value="{{old('quantity')}}"></label><br>
            <input type="hidden" name="id" value="{{$photo->id}}">
            <input type="hidden" name="image_id" value="{{$photo->id}}">
            <input type="hidden" name="name" value="{{$photo->name}}">
            <input type="hidden" name="description" value="{{$photo->description}}">
            <input type="hidden" name="price" value="{{$photo->price}}">
            <button type="submit" class="button btn btn-primary">Add to Cart</button>
        </form>
        @if(Route::has('login'))
            @auth
                <a href="{{route('photos.edit', $photo->id)}}" id="photo' {{$photo->id}} '" class="cartphoto btn btn-primary">Edit</a>
                <form action="{{url('/photos', [$photo->id])}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            @endauth
            @else
        @endif
    </div>
</div>
@endsection
