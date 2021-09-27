<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
    <div id="testForm">
        <forma> </forma>
    </div>
{{--        <div id="app">--}}
{{--            <test> </test>--}}
{{--        </div>--}}
    <div id="countAnswers">
        <count-ans> </count-ans>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
