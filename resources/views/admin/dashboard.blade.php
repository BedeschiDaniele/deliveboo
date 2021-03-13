<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     </head>
    <body>
        <div class="container">
            <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">Piatti</a>
            <a class="btn btn-secondary" href="">Ordini</a>
        </div>
    </body>
</html>
