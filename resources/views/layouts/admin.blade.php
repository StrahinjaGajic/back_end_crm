<!DOCTYPE html>
<html>
<head>
    @include('partials._header')
    <style>
        .search-input::placeholder {
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse" style="padding:0; margin: 0; border: none; border-radius: 0; background-color: #6c6d6d">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><img style="height: 15px;" src="{{asset('image/HamburgerIcon.png')}}" /></a>
            <a style="padding: 10px;" class="navbar-brand" href="/"><img style="height: 36px; " src="{{asset('image/MainSiteLogoTop.png')}}" /></a>
        </div>
        {{--<ul class="nav navbar-nav">--}}
            {{--<li --}}{{--class="active"--}}{{--><a href="#">Home</a></li>--}}
            {{--<li><a href="#">Page 1</a></li>--}}
            {{--<li><a href="#">Page 2</a></li>--}}
        {{--</ul>--}}
        <div class="pull-right">
        <form class="navbar-form navbar-left" style="margin: 0; padding: 0; height: 55px;">
            <div class="form-group search-field" style="background-color: #a6a8ab; border-radius: 0; border: 0; height: 100%;">
                <input type="text" class="search-input form-control" placeholder="Search" style="color: white; background-color: #a6a8ab; height: 100%; border: 0;">
                <button type="submit" class="btn btn-default" style="background-color: #a6a8ab; height: 100%; border: 0;"><img style="height: 25px;" src="{{asset('image/SearchIcon.png')}}" /></button>
            </div>
        </form>
        <ul class="nav navbar-nav navbar-left">
            <li><a style="padding: 10px;" href="#"><img style="height: 35px;" src="{{asset('image/PeronalProfileIcon.png')}}" /></a></li>
            <li><a style="padding: 10px;" href="#"><img style="height: 35px;" src="{{asset('image/FinancesIcon.png')}}" /></a></li>
            <li><a style="padding: 10px;" href="#"><img style="height: 35px;" src="{{asset('image/NotificationsIcon.png')}}" /></a></li>
            <li><a style="padding: 10px;" href="#"><img style="height: 35px;" src="{{asset('image/CheckRemindersIcon.png')}}" /></a></li>
        </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
        <div class="row" style="background-color: #44c7f4;">
            <div class="col-md-2">
                @include('partials.admin._nav')
            </div>
            <div class="col-md-10" style="background-color: #fff;">
                @yield('content')
            </div>
        </div>
    @include('partials._footer')
    </div>
</body>
</html>