<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        Campaign::create([
            'title' => 'Bantu Korban Banjir',
            'description' => 'Donasi untuk korban banjir',
            'target_donation' => 10000000,
            'collected_donation' => 2500000,
            'deadline' => '2026-12-31'
        ]);

        Campaign::create([
            'title' => 'Beasiswa Anak Yatim' ,
            'description' => 'Pendidikan untuk anak yatim',
            'target_donation' => 20000000,
            'collected_donation' => 5000000,
            'deadline' => '2026-11-30'
        ]);
    }
}
