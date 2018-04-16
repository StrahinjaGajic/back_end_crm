<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible"  content="IE=edge">

    <meta name="viewport"               content="width=device-width, initial-scale=1">
    <meta name="description"            content="">
    <meta name="keywords"               content="">
    <meta name="author"                 content="">
    <meta name="language"               content="en">
    <meta name="csrf-token"             content="">
    <meta name="theme-color"            content="#44c7f4">

    <meta property="og:title"           content="">
    <meta property="og:site_name"       content="">
    <meta property="og:image"           content="">
    <meta property="og:url"             content="">
    <meta property="og:description"     content="">

    <title>CRM | @yield('page_title')</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="image/png"  rel="icon"          href="">
    <link type="text/css"   rel="stylesheet"    href="{{ asset('css/admin/app.css') }}">
</head>
<body id="body">
@include('layouts.user.navbar')
@include('layouts.user.sidebar')

<!-- START MAIN CONTENT -->
<div class="content">
    @yield('content')
</div>
<!-- END MAIN CONTENT -->

<footer>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@yield('perPageScripts')
</body>
</html>