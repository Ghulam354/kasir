@extends('layout.adminL')

@section('header_title', 'Member Management')
@section('header_desc', 'Selamat datang di panel Member Management.')

@section('content')

    <div class="">
        <div class="py-3 flex items-center">
            
            {{-- search --}}
            <form action="{{ route('admin.member') }}" method="get" class="mx-2">
                <input 
                    type="search" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari Nama , Nomor Telepon"
                    class="p-3 px-5 w-100 rounded-2xl border">
            </form>

            {{-- add member --}}
            <div class="">
                <a href="{{ route('admin.member.add') }}" class="p-3 bg-blue-600 rounded-2xl text-white">Tambah Member</a>
            </div>
        </div>

        <div>
            <table cellspacing="0" cellpadding="8" class="w-290 text-center border">
                <thead class="bg-purple-500 text-white">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Nomor Telepon</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if($members->isEmpty())
                        <tr>
                            <td colspan="4" class="p-5">
                                Data Belum Ada
                            </td>
                        </tr>
                    @else
                        @foreach ($members as $key => $member)
                            <tr class="border">
                                <td class="p-5">{{ $key + 1 }}</td>
                                <td class="p-5">{{ $member->fullname }}</td>
                                <td class="p-5">{{ $member->phone_number }}</td>

                                <td class="p-5">
                                    <a href="{{ route('admin.member.edit', $member->id) }}"
                                        class="p-3 rounded-xl bg-yellow-400">Edit</a>

                                    <form action="{{ route('admin.member.delete', $member->id) }}"
                                          method="POST"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="p-3 rounded-xl bg-red-500 text-white"
                                            onclick="return confirm('Hapus member ini?')">
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
