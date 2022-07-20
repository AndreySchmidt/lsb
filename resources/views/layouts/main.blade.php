<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Title</title>
    </head>
    <body>
        <div class="container">
            <nav class="row navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('about') }}">About</a>
                    <a class="navbar-brand" href="{{ route('contacts.index') }}">Contacts</a>
                    <a class="navbar-brand" href="{{ route('main.index') }}">Main</a>
                    <a class="navbar-brand" href="{{ route('post.index') }}">Post</a>
                </div>
            </nav>
            @yield('content')
        </div>
    </body>
</html>
