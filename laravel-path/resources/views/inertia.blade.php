<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{config('app.name', "Laravel Path")}}</title> --}}
    @inertiaHead

    @vite(['resources/js/app.ts', 'resources/css/app.css'])
    {{--
    <link rel="stylesheet" href="{{asset('/build/assets/app-26222f93.css')}}">
    <script src="{{asset('build/assets/app-852d282c.js')}}" defer type="module"></script> --}}
</head>

<body>
    {{-- <div id="app" data-page="{{ json_encode($page)}}"></div> --}}

    @inertia
</body>

</html>
