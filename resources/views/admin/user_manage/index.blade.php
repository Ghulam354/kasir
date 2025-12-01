@extends('layout.adminL')

@section('header_title', 'User Management')
@section('header_desc', 'Selamat datang di panel User Management.')

@section('content')

    <div class="">
        <div class="py-3 flex items-center">
            {{-- cari user --}}
            <form action="{{ route('admin.user') }}" method="get" class="mx-2">
                <input type="search" name="search" id="search" value="{{ request('search') }}"
                    placeholder="Cari Username , Nama , Nomor Telepon" class="p-3 px-5 w-100 rounded-2xl border">
            </form>

            <div class="">
                <a href="{{ route('admin.user.add') }}" class="p-3 bg-blue-600 rounded-2xl">Tambah User</a>
            </div>
        </div>
        <div class="">
            <table cellspacing="0" cellpadding="8" class="w-290 text-center border">
                <thead class="bg-purple-500 ">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Username</th>
                        <th class="p-3">Password</th>
                        <th class="p-3">Nama Lengkap</th>
                        <th class="p-3">Nomor Lengkap</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($users->isEmpty())
                        <tr>
                            <td class="colspan-6 p-5">
                                Data Belum Ada
                            </td>
                        </tr>
                    @else
                        @foreach ($users as $key => $user)
                            <tr class="border">
                                <td class="p-5">{{ $key + 1 }}</td>
                                <td class="p-5">{{ $user->username }}</td>
                                <td class="p-5">{{ '********' }}</td>
                                <td class="p-5">{{ $user->fullname }}</td>
                                <td class="p-5">{{ $user->phone_number }}</td>
                                <td class="p-5">
                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                        class="p-3 my-5 rounded-xl bg-yellow-400">Edit</a>
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus user ini?')"
                                            class="p-3 my-5 rounded-xl bg-red-500 text-white">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
