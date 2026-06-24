@extends('app')

@section('title', 'Tambah Campaign')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-3xl bg-white border border-gray-100 shadow-md rounded-md">
        <form action="/campaign" method="POST" class="p-8 space-y-6">
            @csrf

            <section class="space-y-3">
                <h2 class="text-xl font-bold text-gray-800 border-b-2 border-green-500 pb-2">Informasi Kampanye</h2>

                <div>
                    <input type="text" name="title" placeholder="Judul Kampanye"
                           class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none" required>
                </div>

                <div>
                    <textarea name="description" rows="6" placeholder="Deskripsi Lengkap"
                              class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none" required></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Target Dana (Rp)</label>
                        <input type="number" name="target_donation" placeholder="Contoh: 10000000"
                               class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none" required>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Dana Terkumpul (Rp)</label>
                        <input type="number" name="collected_donation" placeholder="Contoh: 10000000"
                               class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-600 mb-1">Batas Waktu</label>
                        <input type="date" name="deadline"
                               class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none" required>
                    </div>
                </div>
            </section>

            <section class="space-y-3 bg-gray-50 p-4 rounded-md">
                <h2 class="text-sm font-bold text-blue-600 uppercase tracking-wider">Info Rekening Pencairan (1:1)</h2>

                <div>
                    <input type="text" name="bank_name" placeholder="Nama Bank (Misal: BRI, BSI, BCA)"
                           class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="account_number" placeholder="Nomor Rekening"
                               class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none" required>
                    </div>

                    <div>
                        <input type="text" name="account_holder" placeholder="Nama Pemilik Rekening"
                               class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none" required>
                    </div>
                </div>
            </section>

            <section class="space-y-3">
                <h2 class="text-sm font-bold text-emerald-600 uppercase tracking-wider">Pilih Kategori (M:M)</h2>

                <div class="flex flex-wrap gap-x-5 gap-y-2">
                    @foreach ($categories as $category)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                   class="rounded text-green-500 focus:ring-green-500"
                                   @checked(in_array($category->id, old('categories', [])))>
                            <span class="ml-2 text-sm text-gray-700">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>

                <p class="text-xs text-gray-500 italic">* Anda bisa memilih lebih dari satu kategori</p>
            </section>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-md shadow-md transition transform active:scale-95">
                🚀 Publikasikan Kampanye Sosial
            </button>
        </form>
    </div>
</div>
@endsection
