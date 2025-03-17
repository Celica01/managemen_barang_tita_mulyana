@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label class="block mb-2">Nama</label>
        <input type="text" name="name" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2">Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2">Level</label>
        <select name="level_id" class="w-full border p-2 rounded mb-4">
            @foreach($levels as $level)
                <option value="{{ $level->id }}">{{ $level->level }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
