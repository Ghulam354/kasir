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
    <aside class="w-64 bg-gray-400  h-screen sticky top-0 flex flex-col shadow-xl">
        <div class="flex items-center p-3 bg-white m-2 rounded-2xl">
            <div class="">
                <div class="w-15 h-15 bg-blue-600 rounded-full"></div>
            </div>
            <div class="mx-2">
                <div class="grid ">
                    <div class="bg-blue-500 p-2 w-35 rounded-2xl text-white font-black">
                        <h1 class="text-xs font-bold text-center">{{ session('role') }}</h1>
                    </div>
                    <div class="bg-blue-500 p-2 w-35 my-1  rounded-2xl text-white font-black">
                        <h1 class="text-xs font-bold text-center">{{ session('fullname') }}</h1>
                    </div>
                    <div
                        class=" transition-all duration-200 p-1 w-35 {{ request()->routeIs('logout') ? 'bg-red-500' : 'hover:bg-red-500'  }} bg-red-500 w-20 rounded-2xl text-center font-black">
                        <a href="{{ route('logout') }}"
                            class="  text-xs text-center font-bold text-black hover:text-white  ">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="flex flex-col p-4 space-y-2 bg-white m-2 rounded-2xl">

            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 font-semibold text-white' : 'hover:bg-blue-700 ' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.user') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.user') ? 'bg-blue-600 font-semibold text-white' : 'hover:bg-blue-700 ' }}">
                Manajemen User
            </a>

            <a href="{{ route('admin.member') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.member') ? 'bg-blue-600 font-semibold text-white' : 'hover:bg-blue-700 ' }}">
                Management Member
            </a>

            <a href="{{ route('admin.barang') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
                {{ request()->routeIs('admin.barang') ? 'bg-blue-600 font-semibold text-white' : 'hover:bg-blue-700 ' }}">
                Management Barang
            </a>

            <a href="{{ route('admin.transaksi') }}" class="px-3 py-2 rounded-lg transition-all duration-200 
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