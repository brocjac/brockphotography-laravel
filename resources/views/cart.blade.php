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
            <h1>Cart</h1>

{{--        @if ($getCartItems::count() > 0)--}}

{{--            <h2>{{$getCartItems::count()}} item(s) in Shopping Cart</h2>--}}
{{--        @else--}}
{{--            <h3>No items in Cart</h3>--}}
{{--        @endif--}}
        @foreach ($getCartItems as $photoCart)
            <div class="cartItem">
                <p>{{$photoCart['name']}}</p>
                <p>{{$photoCart['price']}}</p>
                <p>{{$photoCart['description']}}</p>
                <p>{{$photoCart['quantity']}}</p>
            </div>
        @endforeach
    </div>
@endsection
