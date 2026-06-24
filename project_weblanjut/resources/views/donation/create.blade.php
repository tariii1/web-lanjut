@extends('app')

@section('title', 'Tambah Donasi')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-3xl bg-white border border-gray-100 shadow-md rounded-md">
        <form action="{{ route('donation.store') }}" method="POST" class="p-8 space-y-6">
            @csrf

            <section class="space-y-3">
                <h1 class="text-xl font-bold text-gray-800 border-b-2 border-green-500 pb-2">Tambah Donasi</h1>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md">
                        <p class="font-semibold">Data belum lengkap.</p>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Campaign</label>
                    <select name="campaign_id"
                            class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none"
                            required>
                        <option value="">Pilih campaign tujuan</option>
                        @foreach ($campaigns as $campaign)
                            <option value="{{ $campaign->id }}" @selected(old('campaign_id') == $campaign->id)>
                                {{ $campaign->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Donatur</label>
                        <input type="text" name="donor_name" value="{{ old('donor_name') }}" placeholder="Masukkan nama donatur"
                               class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nominal Donasi (Rp)</label>
                        <input type="number" name="amount" value="{{ old('amount') }}" min="1000" placeholder="Contoh: 50000"
                               class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                    <textarea name="message" rows="5" placeholder="Tulis doa atau pesan singkat"
                              class="w-full border border-gray-400 rounded-md px-3 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none">{{ old('message') }}</textarea>
                </div>
            </section>

            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <a href="/Donasi" class="text-gray-500 hover:text-gray-700 transition">Batal</a>

                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-md shadow-md transition transform active:scale-95">
                    Simpan Donasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
