<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body class="bg-black">
    <div class=" w-auto  md:w-3xl mx-auto px-10 py-10 h-screen md:h-auto bg-yellow-500 mt-0 md:mt-5 ">
        @yield('content')
    </div>    
    @vite('resources/js/app.js')
  </body>
</html>   