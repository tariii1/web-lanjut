<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign; // 1. WAJIB ditambahkan agar class Campaign terbaca

class CampaignController extends Controller
{
    // READ (list)
    public function index()
    {
        // 2. Perbaikan: Variabel harus menggunakan '$', 
        // dan nama variabel plural agar konsisten (campaigns)
        $campaigns = Campaign::all(); 
        return view('campaign.index', compact('campaigns'));
    }

    // CREATE (form)
    public function create()
    {
        return view('campaign.create');
    }

    // STORE (insert)
    public function store(Request $request)
    {
        // Pastikan field di database sudah masuk ke 'fillable' di Model Campaign
        Campaign::create($request->all());
        return redirect('/campaign')->with('success', 'Data berhasil ditambahkan');
    }

    // EDIT (form)
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaign.edit', compact('campaign'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->update($request->all());

        return redirect('/campaign')->with('success', 'Data berhasil diupdate');
    }

    // DELETE
    // 3. Perbaikan Typo: dari 'destory' menjadi 'destroy'
    public function destroy($id)
    {
        // 4. Perbaikan Typo: dari 'destory' menjadi 'destroy'
        Campaign::destroy($id);
        return redirect('/campaign')->with('success', 'Data berhasil dihapus');
    }
}