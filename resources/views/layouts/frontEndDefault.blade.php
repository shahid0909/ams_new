<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AMS @yield('title')</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:300,400,700|Rubik:300,400,700,900" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="{{asset('frontend/css/styles-merged.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<!--[if lt IE 9]>
    <script src="{{asset('frontend/js/vendor/html5shiv.min.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/respond.min.js')}}"></script>
    <![endif]-->
    <style>
        .probootstrap-footer {
            padding: 3em 0 0;
        }
        .demo {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .lang {
            margin: 0 auto;
        }

        .button_lang {
            cursor: pointer;
            display: inline-block;
            padding: 0.25em 0em;
            border-radius: 10px;
            width: 5em;
            transition: 0.25s ease;
        }

        .button_lang:hover {
            background: #b5d6b2;
            transition: 0.25s ease;
        }

        .current_lang {
            background: #b5d6b2;
        }

        .translation {
            text-align: center;
            margin: 0.5em;
        }

        .english {
            font-family: "Asap", sans-serif;
        }

        .chinese {
            font-family: "Noto Sans SC", sans-serif;
            font-size: 1.5em;
        }

        .japanese {
            font-family: "Noto Sans JP", sans-serif;
            font-size: 2em;
        }
    </style>
    @yield('css')
</head>
<body>

@include('layouts.partials.frontend.menu')
<!-- END: header -->

@yield('content')

<!-- START: footer -->
@include('layouts.partials.frontend.footer')
<!-- END: footer -->

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{asset('frontend/js/scripts.min.js')}}"></script>
<script src="{{asset('frontend/js/main.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>


@yield('js')
</body>
</html>
