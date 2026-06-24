<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign; // 1. WAJIB ditambahkan agar class Campaign terbaca
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    // READ (list)
    public function index()
    {
        $campaigns = Campaign::all(); 
        return view('campaign.index', compact('campaigns'));
    }

    // CREATE (form)
    public function create()
    {
        $this->ensureDefaultCategories();

        $categories = Category::orderBy('name')->get();

        return view('campaign.create', compact('categories'));
    }

    // STORE (insert) - SUDAH DIPERBARUI dengan relasi
    public function store(Request $request)
    {
        $this->ensureDefaultCategories();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'target_donation' => ['required', 'numeric', 'min:0'],
            'collected_donation' => ['required', 'numeric', 'min:0'],
            'deadline' => ['required', 'date'],
            'bank_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'string', 'max:255'],
            'account_holder' => ['required', 'string', 'max:255'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['exists:categories,id'],
        ]);

        DB::transaction(function () use ($validated) {
            // 1. Simpan data Campaign
            $campaign = Campaign::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'target_donation' => $validated['target_donation'],
                'collected_donation' => $validated['collected_donation'],
                'deadline' => $validated['deadline'],
            ]);

            // 2. Simpan Relasi One-to-One (Rekening / Account)
            $campaign->account()->create([
                'bank_name'      => $validated['bank_name'],
                'account_number' => $validated['account_number'],
                'account_holder' => $validated['account_holder'],
            ]);

            // 3. Simpan Relasi Many-to-Many (Kategori)
            $campaign->categories()->attach($validated['categories']);
        });

        return redirect('/campaign')->with('success', 'Data berhasil ditambahkan');
    }

    private function ensureDefaultCategories(): void
    {
        foreach (['Kesehatan', 'Bencana Alam', 'Pendidikan', 'Panti Asuhan'] as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
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
    public function destroy($id)
    {
        Campaign::destroy($id);
        return redirect('/campaign')->with('success', 'Data berhasil dihapus');
    }
}
