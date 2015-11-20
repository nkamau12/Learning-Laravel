<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/all.css">


</head>
<body>
    @include('navbar')
    <div class="container">
        @include('flash::message')

        @yield('content')
    </div>

    <script src="/js/all.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        //$('#flash-overlay-modal').modal();
        $('div.alert').not('alert-important').delay(3000).slideUp(300);
    </script>
    @yield('footer')
</body>
</html>