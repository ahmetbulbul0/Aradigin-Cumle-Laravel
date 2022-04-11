<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aradığın Cümle | {{ $data["page_title"] ?? "TANIMLANMAMIŞ SAYFA" }}</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('src/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body class="{{ Session::get("visitorData.website_theme") ?? Session::get("userData.settings.website_theme")  }}">
    <div class="pageContainer">
        <div class="contentWrap">
            @yield('content')
        </div>
        @include("visitor.components.footer")
    </div>
</body>

</html>
