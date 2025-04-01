<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('../../resources/css/app.css')
    <script src="https://kit.fontawesome.com/972fcfc2fa.js" crossorigin="anonymous"></script>
</head>

<body class="bg-black">
    <div class="container ">
        <div class="flex flex-row  w-[98.7vw]">
            <div class="basis-1/5 hidden md:block">
                @include('layouts.sidebar')
            </div>

            <div class="basis-4/5 flex justify-end md:justify-center mt-5 ">
                @yield('content')
            </div>
        </div>




    </div>



</body>

</html>

min-[72em]:ml-15 min-[50em]:ml-30 