@extends('app')

@section('title', 'Daftar Campaign')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Campaign</h1>
            <p class="mt-1 text-sm text-gray-500">Kelola campaign sosial dan pantau perkembangan dana terkumpul.</p>
        </div>

        <a href="/campaign/create" class="inline-flex justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-5 rounded-md shadow-md transition">
            Tambah Campaign
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-gray-100 shadow-md rounded-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold">Campaign</th>
                        <th class="px-4 py-3 text-left font-semibold">Target</th>
                        <th class="px-4 py-3 text-left font-semibold">Terkumpul</th>
                        <th class="px-4 py-3 text-left font-semibold">Progress</th>
                        <th class="px-4 py-3 text-left font-semibold">Deadline</th>
                        <th class="px-4 py-3 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($campaigns as $campaign)
                        @php
                            $target = max((float) $campaign->target_donation, 1);
                            $collected = (float) $campaign->collected_donation;
                            $progress = min(round(($collected / $target) * 100), 100);
                        @endphp

                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4">
                                <p class="font-semibold text-gray-800">{{ $campaign->title }}</p>
                                <p class="mt-1 max-w-xs truncate text-xs text-gray-500">{{ $campaign->description }}</p>
                            </td>
                            <td class="px-4 py-4 text-gray-700">
                                Rp {{ number_format($campaign->target_donation, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 font-bold text-green-600">
                                Rp {{ number_format($campaign->collected_donation, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 min-w-40">
                                <div class="flex items-center gap-3">
                                    <div class="h-2 w-24 rounded-full bg-gray-200 overflow-hidden">
                                        <div class="h-full rounded-full bg-green-500" style="width: {{ $progress }}%"></div>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-600">{{ $progress }}%</span>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="/campaign/{{ $campaign->id }}/edit" class="text-blue-600 hover:text-blue-800 font-semibold">
                                        Edit
                                    </a>

                                    <form action="/campaign/{{ $campaign->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-gray-500">
                                Belum ada campaign. Silakan tambah campaign baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
