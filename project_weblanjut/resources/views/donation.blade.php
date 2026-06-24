@extends('app')

@section('title', 'Daftar Donasi')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Donasi</h1>
            <p class="mt-1 text-sm text-gray-500">Riwayat donasi yang sudah masuk ke campaign sosial.</p>
        </div>

        <a href="{{ route('donation.create') }}" class="inline-flex justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-5 rounded-md shadow-md transition">
            Tambah Donasi
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-gray-100 shadow-md rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Donatur</th>
                    <th class="px-4 py-3 text-left font-semibold">Campaign</th>
                    <th class="px-4 py-3 text-left font-semibold">Nominal</th>
                    <th class="px-4 py-3 text-left font-semibold">Pesan</th>
                    <th class="px-4 py-3 text-left font-semibold">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($donations as $donation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $donation->donor_name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $donation->campaign->title ?? 'Campaign tidak ditemukan' }}</td>
                        <td class="px-4 py-3 font-bold text-green-600">
                            Rp {{ number_format($donation->amount, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $donation->message ?: '-' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $donation->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                            Belum ada data donasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
