@extends('layout.adminL')

@section('header_title', 'New User Management')
@section('header_desc', 'Tambah User Management.')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.user') }}" class="p-3 bg-purple-400 text-white rounded">Kembali</a>
    </div>

    <form action="{{ route('admin.user.store') }}" method="post" class="w-150 p-5 bg-white rounded shadow">
        @csrf

        {{-- Username --}}
        <div class="mb-4">
            <label for="username" class="block mb-2">Username</label>
            <input type="text" name="username" id="username" class="p-3 w-full border rounded"
                value="{{ old('username') }}" required>
        </div>

        {{-- Password --}}
        <div class="mb-4 relative">
            <label for="password" class="block mb-2">Password</label>

            <input type="password" name="password" id="password" class="p-3 w-full border rounded pr-10" required>

            <!-- tombol show/hide -->
            <span id="togglePassword" class="absolute right-3 top-12 cursor-pointer select-none">
                Show
            </span>
        </div>


        {{-- Nama Lengkap --}}
        <div class="mb-4">
            <label for="fullname" class="block mb-2">Nama Lengkap</label>
            <input type="text" name="fullname" id="fullname" class="p-3 w-full border rounded"
                value="{{ old('fullname') }}" required>
        </div>

        {{-- Nomor Telepon --}}
        <div class="mb-4">
            <label for="phone_number" class="block mb-2">Nomor Telepon</label>
            <input type="text" name="phone_number" id="phone_number" class="p-3 w-full border rounded"
                value="{{ old('phone_number') }}" required>
        </div>

        {{-- Role --}}
        <div class="mb-4">
            <label for="role" class="block mb-2">Role</label>
            <select name="role" id="role" class="p-3 w-full border rounded" required>
                <option value="">-- Pilih Role --</option>
                <option value="ADMIN" {{ old('role') === 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                <option value="KASIR" {{ old('role') === 'KASIR' ? 'selected' : '' }}>KASIR</option>
            </select>
        </div>

        {{-- Submit --}}
        <div class="mt-5">
            <button type="submit" class="p-3 bg-purple-600 text-white rounded w-full">
                Simpan User
            </button>
        </div>
    </form>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // ganti icon
            togglePassword.textContent = type === 'password' ? 'show' : 'hide';
        });
    </script>

@endsection
