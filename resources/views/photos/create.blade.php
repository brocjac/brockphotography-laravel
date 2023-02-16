@extends('components/pages_layout')

@section('title')
    Brock Photography Add a Photo
@endsection
@section('content')
<h1>Add new photo</h1>
    <form method="post" action="{{url('/photos')}}" enctype="multipart/form-data">
        @csrf
        <p><label>Title: <input type="text" name="name" value="{{old('name')}}"></label></p>
        <p><label>Thumbnail Image: <input type="file" name="image" value="{{old('image')}}"></label></p>
        <p><label>Display Image: <input type="file" name="imageLarge" value="{{old('imageLarge')}}"></label></p>
        <p><label>Photo Alt Tag: <input type="text" name="description" value="{{old('description')}}"></label></p>
        <p><label>Image Value: <input type="number" step=".01" name="price" value="{{old('price')}}"></label></p>
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
