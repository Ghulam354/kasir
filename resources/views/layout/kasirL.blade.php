<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir - {{ session('username') }}</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
    <main class="">
        @yield('content')
    </main>
    <script>
        // Jika Laravel memberi session flash success
        @if (session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast();
        @endif

        // Jika Laravel memberi session flash error
        @if (session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
            }).showToast();
        @endif

        document.getElementById("btnCheckout").addEventListener("click", function() {
            Toastify({
                text: "Memproses checkout...",
                duration: 1500,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #2193b0, #6dd5ed)",
            }).showToast();
        });
    </script>

</body>

</html>
