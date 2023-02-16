@extends('components.pages_layout')

@section('title')
    Brock Photography Edit a Photo
@endsection
@section('content')

    <h1>Add new photo</h1>
    <form method="post" action="{{url('/photos', [$image->id])}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <p><label>Title: <input type="text" name="name" value="{{$image->name}}"></label></p>
        <p><label>Small Image: <input type="file" name="image"></label></p>
        <p><label>Large Image: <input type="file" name="imageLarge"></label></p>
        <p><label>Photo Alt Tag: <input type="text" name="description" value="{{$image->description}}"></label></p>
        <p><label>Image Value: <input type="number" step=".01" name="price" value="{{$image->price}}"></label></p>
        <label for="CategoryId">Choose a Category:
            <select name="CategoryId">
                <option value="1" @if ($image->CategoryId === 1)selected @endif>Landscapes</option>
                <option value="2" @if ($image->CategoryId === 2)selected @endif>Foods</option>
            </select>
        </label>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="submit">Update Photo</button>
    </form>
@endsection
