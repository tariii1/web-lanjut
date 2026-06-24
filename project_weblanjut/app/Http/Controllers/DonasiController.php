<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function Donasi()
    {
        $donations = Donation::with('campaign')->latest()->get();

        return view('donation', compact('donations'));
    }

    public function create()
    {
        $campaigns = Campaign::orderBy('created_at', 'desc')->get();

        return view('donation.create', compact('campaigns'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => ['required', 'exists:campaigns,id'],
            'donor_name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1000'],
            'message' => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($validated) {
            Donation::create($validated);

            Campaign::where('id', $validated['campaign_id'])
                ->increment('collected_donation', $validated['amount']);
        });

        return redirect('/Donasi')->with('success', 'Terima kasih, donasi berhasil disimpan.');
    }
}
