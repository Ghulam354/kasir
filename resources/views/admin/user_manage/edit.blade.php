@extends('layout.adminL')

@section('header_title', 'Edit User')
@section('header_desc', 'Perbarui data user.')

@section('content')

<div class="max-w-xl mx-auto p-5 bg-white border rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-5">Edit User</h2>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf

        {{-- Username --}}
        <div class="mb-4">
            <label class="block mb-2">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}"
                   class="p-3 w-full border rounded" required>
        </div>

        {{-- Nama --}}
        <div class="mb-4">
            <label class="block mb-2">Nama Lengkap</label>
            <input type="text" name="fullname" value="{{ old('fullname', $user->fullname) }}"
                   class="p-3 w-full border rounded" required>
        </div>

        {{-- Nomor Telepon --}}
        <div class="mb-4">
            <label class="block mb-2">Nomor Telepon</label>
            <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                   class="p-3 w-full border rounded" required>
        </div>

        {{-- Role --}}
        <div class="mb-4">
            <label class="block mb-2">Role</label>
            <select name="role" class="p-3 w-full border rounded" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
        </div>

        {{-- Password --}}
        <div class="mb-4 relative">
            <label class="block mb-2">Password (isi jika ingin ubah)</label>

            <input 
                type="password" 
                name="password" 
                id="password" 
                class="p-3 w-full border rounded pr-10">

            <span 
                id="togglePassword"
                class="absolute right-4 top-12 cursor-pointer select-none text-lg">
                👁️
            </span>
        </div>

        <button class="mt-4 p-3 w-full bg-blue-600 text-white rounded-xl">
            Update User
        </button>
    </form>
</div>

{{-- Script Show/Hide Password --}}
<script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', () => {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        togglePassword.textContent = 
            type === 'password' ? '👁️' : '🙈';
    });
</script>

@endsection
