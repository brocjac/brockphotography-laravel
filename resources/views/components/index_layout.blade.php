<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="{{asset('css/design.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/lightbox.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap-modified.css')}}" rel="stylesheet">
</head>
<body>
<div>
<nav>
    <h3><a class="links" href="{{url('/')}}">Brock Photography</a></h3>
    <div id="navbar">
        <ul>
            <li> <a href="{{url('/galleries')}}">Galleries</a></li>
            <li> <a href="{{url('/contact')}}">Contact</a></li>

            {{--PHP version--}}
{{--            <?php if(isset($_SESSION['authUser']) and $_SESSION['authUser']): ?>--}}
{{--            <?php if ($_SESSION['authUser']['role'] == 'admin'): ?>--}}
{{--            <li><a href="users.php">Edit Users</a></li>--}}
{{--            <li><a href="user_page.php">User Information</a></li>--}}
{{--            <?php elseif ($_SESSION['authUser']['role'] == 'user'):?>--}}
{{--            <li><a href="user_page.php">User Information</a></li>--}}
{{--            <?php endif; ?>--}}
{{--            <?php else: ?>--}}
{{--            <li> <a href="sign_up_login.php">Sign Up</a></li>--}}
{{--            <?php endif; ?>--}}
{{--            <?php if(isset($_SESSION['authUser'])): ?>--}}
{{--            <form method="get">--}}
{{--                <div class="logoutFloat"><input type="submit" name="logout" class="btnSubmit" value="Log Out"></div>--}}
{{--            </form>--}}
{{--            <?php endif; ?>--}}

            {{--Laravel version--}}
{{--            <?php if(isset($_SESSION['authUser']) and $_SESSION['authUser']): ?>--}}
{{--            <?php if ($_SESSION['authUser']['role'] == 'admin'): ?>--}}
{{--            <li><a href="users.php">Edit Users</a></li>--}}
{{--            <li><a href="user_page.php">User Information</a></li>--}}
{{--            <?php elseif ($_SESSION['authUser']['role'] == 'user'):?>--}}
{{--            <li><a href="user_page.php">User Information</a></li>--}}
{{--            <?php endif; ?>--}}
{{--            <?php else: ?>--}}
                @if(Route::has('login'))
                    @auth
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <li> <button type="submit">Logout</button></li>
                        </form>
                    @else
                        <li> <a href="{{url('/login')}}">Login</a></li>
                        <li> <a href="{{url('/register')}}">Register</a></li>
                        @endauth
                @endif
            @if(auth()->check())
            <li id="cart"> <a href="{{url('/cart')}}"><img src="/images/illustrations/cart/shopping_cart.svg" alt="Shopping cart. " id="cartshop"/></a></li>
            @else

            @endif
        </ul>
    </div>
</nav>
@yield('content')
<script src="{{asset('js/script.js')}}"></script>
<footer>
    <p>brocjac24@outlook.com
        <br>
        Copywrite 2019</p>
    <a href="https://www.instagram.com/brock_productions_2434/" target="_blank">
        <img src="/images/illustrations/instagram.svg" alt="Instagram. " width="30px">
    </a>
    <a href="https://www.facebook.com/Brock-Photography-2247863825329198/?modal=admin_todo_tour" target="_blank">
        <img src="/images/illustrations/facebook.svg" alt="Facebook. " width="30px">
    </a>
</footer>
</div>
</body>
</html>
