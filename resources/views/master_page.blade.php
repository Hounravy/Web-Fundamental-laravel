<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('images/burger.jpg')}}" type="image/x-icon" />
    <title>@yield('title')</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="{{url('images/logo.png')}}" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="{{ url('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('categories') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ url('food') }}">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
@yield('content')





    {{-- footer --}}

    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="{{url('https://img.icons8.com/fluent/50/000000/facebook-new.png')}}"/></a>
                </li>
                <li>
                    <a href="#"><img src="{{url('https://img.icons8.com/fluent/48/000000/instagram-new.png')}}"/></a>
                </li>
                <li>
                    <a href="#"><img src="{{url('https://img.icons8.com/fluent/48/000000/twitter.png')}}"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->



</body>
</html>
