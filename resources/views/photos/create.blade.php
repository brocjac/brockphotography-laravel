@extends('components/pages_layout')

@section('title')
    Brock Photography Add a Photo
@endsection
@section('content')
<h1>Add new photo</h1>
    <form method="post" action="{{url('/photos')}}" enctype="multipart/form-data">
        @csrf
        <p><label>Title: <input type="text" name="Title" value="{{old('Title')}}"></label></p>
        <p><label>Small Image: <input type="file" name="ImgSrc" value="{{old('ImgSrc')}}"></label></p>
        <p><label>Large Image: <input type="file" name="LargeImgSrc" value="{{old('LargeImgSrc')}}"></label></p>
        <p><label>Photo Alt Tag: <input type="text" name="Alt" value="{{old('Alt')}}"></label></p>
        <p><label>Image Value: <input type="number" step=".01" name="PhotoValuePrice" value="{{old('PhotoValuePrice')}}"></label></p>
        <label for="CategoryId">Choose a Category:
            <select name="CategoryId">
                <option value="1">Landscapes</option>
                <option value="2">Foods</option>
            </select>
        </label>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="submit">Add Photo</button>
    </form>
@endsection
