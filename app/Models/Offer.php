<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{

    protected $fillable = [
        'amount',
        'status',
        'user_id',
        'startup_id',
        'offer_message'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }
}
