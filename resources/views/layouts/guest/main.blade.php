<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Deliveboo</title>
         <!-- Styles -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <link href=" {{ asset('css/app.css')  }} " rel="stylesheet">
        <link href=" {{ asset('css/style.css')  }} " rel="stylesheet">

 </head>
    <body>
      <header>
        @include('guest.header')
      </header>
      <main>
        @yield('content')
      </main>
      <footer>
        @include('guest.footer')
      </footer>

    </body>
</html>
