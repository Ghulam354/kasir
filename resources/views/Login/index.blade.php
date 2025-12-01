<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- css --}}
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center items-center h-dvh bg-blue-700">
    <form action="{{ route('login.proses') }}" method="post" class="w-100 h-auto p-3 bg-white rounded-2xl">
        @csrf
        <div class="text-center p-2">
            <h1 class="text-3xl font-bold">Login</h1>
        </div>
        @if (session('error'))
            <div class="p-3 text-center bg-red-200 rounded-2xl " id="error">
                <h1 class="text-red-600 font-bold text-xs">{{ session('error') }}</h1>
            </div>
        @endif
        <div class="grid p-2">
            <label for="username" class="text-xl font-bold py-2">Nama Pengguna</label>
            <input type="text" name="username" id="" class="p-2 border-b" placeholder="Nama Pengguna" required>
        </div>
        <div class="grid p-2">
            <label for="username" class="text-xl font-bold py-2">Kata Sandi</label>
            <input type="password" name="password" id="pass" class="p-2 border-b" placeholder="Kata Sandi" required>
        </div>
        <div class="p-2 flex items-center">
            <label for="showpassword" class="text-xs font-bold px-1">Liat Kata Sandi</label>
            <input type="checkbox" name="showpassword" id="" onclick="showpass()" class="size-3">
        </div>
        <div class="flex justify-center items-center p-4">
            <button type="submit"
                class="p-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl w-40 transition-transform duration-300 hover:scale-105">
                Masuk
            </button>
        </div>
    </form>

    <script>
        function showpass() {
            const passwordinput = document.getElementById('pass');
            if (passwordinput.type === "password") {
                passwordinput.type = "text";
            } else {
                passwordinput.type = "password";
            }
        }

        const notif = document.getElementById('error');
        if (notif) {
            setTimeout(() => {
                notif.classList.add('opacity-0');
            }, 3000);
        }
    </script>
    </script>
</body>

</html>
