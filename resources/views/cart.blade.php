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

        @if (\App\Models\Cart::count() > 0)

            <h2>{{\App\Models\Cart::count()}} item(s) in Shopping Cart</h2>
        @else
            <h3>No items in Cart</h3>
        @endif
        @foreach ($getCartItems as $photoCart)
            <div class="cartItem">
                <div><img src="data:image/jpeg;base64, {!! base64_encode($photoCart->photo->image) !!}" alt="{{$photoCart->photo->description}}. " class="classImage"></div>
                <div>
                    <p>{{$photoCart->name}}</p>
                    <p>${{$photoCart->price}}</p>
                </div>
                <div><p>Qty: {{$photoCart->quantity}}</p></div>
                <div>
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
