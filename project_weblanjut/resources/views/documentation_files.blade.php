@extends('app')

@section('title', 'Documentation Files')

@section('content')

<form action="/documentations" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700">
            Nama Dokumen/Gambar
        </label>

        <input type="text"
               name="title"
               class="mt-1 block w-full border rounded p-2"
               required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">
            Pilih File (PDF, DOCX, PNG, JPG - Maks 5MB)
        </label>

        <input type="file"
               name="attachment"
               class="mt-1 block w-full text-sm text-gray-500
                      file:mr-4 file:py-2 file:px-4
                      file:rounded file:border-0
                      file:bg-blue-50 file:text-blue-700
                      hover:file:bg-blue-100"
               required>
    </div>

    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
        Unggah File
    </button>
</form>

<hr class="my-8">

<h2 class="text-2xl font-bold mb-4">
    Daftar File dan Gambar
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse($files as $file)

        <div class="border rounded-lg shadow p-4 bg-white">

            <h3 class="font-bold text-lg mb-3">
                {{ $file->title }}
            </h3>

            {{-- Preview Gambar --}}
            @if(in_array($file->file_type, ['jpg', 'jpeg', 'png']))
                <img src="{{ asset('storage/' . $file->file_path) }}"
                     class="w-full h-48 object-cover rounded mb-3">
            @endif

            {{-- Preview PDF --}}
            @if($file->file_type == 'pdf')
                <div class="text-center py-10 text-6xl">"
                        📄
                </div>
            @endif

            {{-- File DOC/DOCX --}}
            @if(in_array($file->file_type, ['doc', 'docx']))
                <div class="text-center py-10 text-5xl">
                    📄
                </div>
            @endif

            <a href="{{ asset('storage/' . $file->file_path) }}"
               target="_blank"
               class="inline-block mt-3 bg-green-600 text-white px-4 py-2 rounded">
                Lihat File
            </a>

        </div>

    @empty

        <div class="col-span-3 text-center text-gray-500">
            Belum ada file yang diunggah.
        </div>

    @endforelse

</div>

@endsection