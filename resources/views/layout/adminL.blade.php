<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    @vite('resources/css/app.css')
</head>

<body class="flex bg-gray-100 min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-400 text-white h-screen sticky top-0 flex flex-col shadow-xl">

        <div class=" m-2 p-1  text-center bg-white text-black rounded-2xl">
            <div class="m-1 bg-blue-500 rounded-2xl ">
                <h1 class="text-lg font-bold text-white p-1 tracking-wide ">ADMIN PANEL</h1>
            </div>
            <div class="flex justify-center items-center mx-1 my-2">
                <div class="bg-yellow-500 p-3 w-35  rounded-2xl text-white font-black">
                    <h1 class="text-xs font-bold tracking-wide">{{ session('fullname') }}</h1>
                </div>
                <div class="bg-yellow-500 p-3 w-20 mx-1 rounded-2xl text-white font-black">
                    <h1 class="text-xs font-bold tracking-wide">{{ session('role') }}</h1>
                </div>
            </div>

            <div class="p-1 my-2 mx-1 rounded-2xl bg-red-600 {{ request()->routeIs('logout') ? 'bg-red-500' : 'hover:bg-red-500'  }}">
                <a href="{{ route('logout') }}" class="  text-lg font-bold text-white transition-all duration-200 
                {{ request()->routeIs('logout') ? 'bg-red-500' : 'hover:bg-red-500'  }}">
                    Logout
                </a>
            </div>


        </div>

        <nav class="flex flex-col p-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 font-semibold' : 'hover:bg-blue-700' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.user') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.user') ? 'bg-blue-600 font-semibold' : 'hover:bg-blue-700' }}">
                Manajemen User
            </a>

            <a href="{{ route('admin.member') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.member') ? 'bg-blue-600 font-semibold' : 'hover:bg-blue-700' }}">
                Management Member
            </a>

            <a href="{{ route('admin.barang') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.barang') ? 'bg-blue-600 font-semibold' : 'hover:bg-blue-700' }}">
                Management Barang
            </a>

            <a href="" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.transaksi') ? 'bg-blue-600 font-semibold' : 'hover:bg-blue-700' }}">
                Management Transaksi
            </a>


        </nav>

    </aside>

    {{-- CONTENT --}}
    <div class="flex-1 p-8">

        {{-- HEADER --}}
        <div class="mb-6 border-b pb-3">
            <h3 class="text-3xl font-bold text-gray-800">@yield('header_title', '')</h3>
            <p class="text-sm text-gray-600 mt-1">@yield('header_desc')</p>
        </div>

        {{-- CARD CONTENT --}}
        <div class="bg-white rounded-xl p-6 shadow-md">
            @yield('content')
        </div>

    </div>

</body>

</html>