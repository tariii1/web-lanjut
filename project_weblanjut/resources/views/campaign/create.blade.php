@extends('app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 shadow rounded">
    <h1 class="text-2xl font-bold mb-4">Tambah Campaign Baru</h1>

    <form action="/campaign" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul Campaign</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Deskripsi</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Target Donasi (Rp)</label>
            <input type="number" name="target_donation" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Deadline</label>
            <input type="date" name="deadline" class="w-full border p-2 rounded" required>
        </div>

        <div class="flex justify-between mt-4">
            <a href="/campaign" class="text-gray-600">Kembali</a>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan Campaign</button>
        </div>
    </form>
</div>
@endsection