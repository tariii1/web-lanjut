@extends('app')

@section('title', 'Edit Campaign')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-gray-800">Edit Campaign</h1>
        </div>

        <form action="/campaign/{{ $campaign->id }}" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Campaign</label>
                <input type="text" name="title" value="{{ $campaign->title }}" 
                       class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4" 
                          class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>{{ $campaign->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Target (Rp)</label>
                <input type="number" name="target_donation" value="{{ $campaign->target_donation }}" 
                       class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
                <input type="date" name="deadline" value="{{ $campaign->deadline }}" 
                       class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div class="flex items-center justify-between pt-4">
                <a href="/campaign" class="text-gray-500 hover:text-gray-700 transition">Batal</a>
                
                {{-- Button Update yang berwarna Hijau/Biru --}}
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-md shadow-md transition transform active:scale-95">
                    Update Campaign
                </button>
            </div>
        </form>
    </div>
</div>
@endsection