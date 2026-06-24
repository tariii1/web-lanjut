<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignAccount extends Model
{
    // Mass Assigment: kolom yang boleh diisi melalu form
    protected $fillable = [
        'campaign_id',
        'bank_name',
        'account_number',
        'account_holder'
    ];

    //Relasi kebalikan: Rekening ini milik (belongsTo) Campaign apa?
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
