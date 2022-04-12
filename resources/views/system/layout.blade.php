<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aradığın Cümle Sistem Paneli | {{ $data["page_title"] }}</title>
    <link rel="stylesheet" href="{{ URL::asset('src/css/private.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body class="{{ Session::get("userData.settings.dashboard_theme")  }}">
    <div class="pageContainer">
        <div class="contentWrap">
            @yield('content')
        </div>
        @include('visitor.components.footer')
    </div>
</body>

</html>
