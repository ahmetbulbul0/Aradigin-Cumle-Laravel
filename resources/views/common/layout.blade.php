<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['page_title'] }}</title>
    <link rel="stylesheet" href="{{ URL::asset('src/css/private.css') }}">
    <script src="https://kit.fontawesome.com/c122eeed9d.js" crossorigin="anonymous"></script>
    @laravelPWA
</head>

<body class="dark">

    @yield('content')

</body>

</html>
