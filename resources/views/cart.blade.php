@extends('components.pages_layout')
@section('title')
    Brock Photography
@endsection
@section('content')
    <div>
        @if (session()->has('success_message'))
            <p>{{session()->get('success_message')}}</p>
        @endif

        @if (count($errors) > 0)
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif

        @if (Cart::count() > 0)

            <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>
        @else
            <h3>No items in Cart</h3>
        @endif
        @foreach (Cart::content() as $photoCart)
            <p>{{$photoCart->id}}</p>
            <p>{{$photoCart->name}}</p>
            <p>{{$photoCart->price}}</p>
            <p>{{$photoCart->qty}}</p>
        @endforeach
    </div>
@endsection
