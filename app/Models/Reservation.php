<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'initDate',
        'endDate',
        'value',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
