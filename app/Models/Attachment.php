<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    protected $fillable = ['ticket_id', 'file_path'];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}