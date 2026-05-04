@extends('app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Daftar Campaign</h1>

<a href="/campaign/create" class="bg-green-500 text-white px-4 py-2 rounded">
    Tambah Campaign
</a>

<table class="table-auto w-full mt-4 bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2">Judul</th>
            <th>Target</th>
            <th>Terkumpul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($campaigns as $c)
        <tr class="border-t">
            <td class="p-2">{{ $c->title }}</td>
            <td>{{ $c->target_donation }}</td>
            <td>{{ $c->collected_donation }}</td>
            <td>
                <a href="/campaign/{{ $c->id }}/edit" class="text-blue-500">Edit</a>

                <form action="/campaign/{{ $c->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection