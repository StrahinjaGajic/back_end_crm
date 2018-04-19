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
    <meta name="csrf-token"             content="{{ csrf_token() }}" />
    <meta name="theme-color"            content="#44c7f4">

    <meta property="og:title"           content="">
    <meta property="og:site_name"       content="">
    <meta property="og:image"           content="">
    <meta property="og:url"             content="">
    <meta property="og:description"     content="">

    <title>CRM | @yield('page_title')</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link type="image/png"  rel="icon"          href="">
    <link type="text/css"   rel="stylesheet"    href="{{ asset('css/admin/app.css') }}">
    <link type="text/css"   rel="stylesheet"    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css">
    <link type="text/css"   rel="stylesheet"    href="{{ asset('css/admin/fileinput.min.css') }}">

</head>
<body id="body" sidebar="true">
    @include('layouts.admin.navbar')

    @include('layouts.admin.sidebar')

    @include('layouts.admin.second-sidebar')

    <!-- START MAIN CONTENT -->
    <div class="content" style="padding-left: 0 !important; padding-bottom: 45px;height: 100%;">
        @yield('content')
    </div>

    <!-- END MAIN CONTENT -->

    <footer>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{asset('js/fileinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/plugins/sortable.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/explorer-fa/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('themes/fa/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/sidebar.js')}}" type="text/javascript"></script>
    @yield('perPageScripts')
</body>
</html>