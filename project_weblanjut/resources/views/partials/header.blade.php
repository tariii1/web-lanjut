<header class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center p-4">
        
        <div class="text-xl font-bold text-green-600">
            Donasiku
        </div>

        <nav class="space-x-6">
           <a href="/" class="text-grey-700 hover:text-green-600">Home</a>
           <a href="/Donasi" class="text-grey-700 hover:text-green-600">Donasi</a>
           <a href="{{route('campaign.index')}}" class="text-grey-700 hover:text-green-600">Campaign</a>
           <a href="/Profile" class="text-grey-700 hover:text-green-600">Profile</a>
           <a href="/Kontak" class="text-grey-700 hover:text-green-600">Kontak</a>
        </nav>

        <a href="/Donasi" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
            Donasi Sekarang
        </a>

    </div>
</header>