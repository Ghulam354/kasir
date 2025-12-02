<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="h-20 bg-gradient-to-tr from-blue-800 to-blue-500 flex items-center">
        <div class="m-2 p-1 flex items-center bg-gradient-to-r from-white to-yellow-100 w-max rounded-2xl">
            {{-- icon --}}
            <div class="w-10 h-10 rounded-full bg-green-600 mx-1 flex justify-center items-center">👤</div>
            {{-- title --}}
            <div class="px-2">
                <h1 class="text-lg font-bold ">{{ session('fullname') }}</h1>
                <h1 class="text-xs font-bold ">{{ session('role') }}</h1>
            </div>

            <a href="{{ route('logout') }}" class="flex items-center m-1">
                <button type="button" class="w-9 h-9 bg-red-500 rounded-xl">➡️</button>
            </a>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>