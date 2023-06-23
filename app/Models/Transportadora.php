<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transportadora extends Model
{
    use HasFactory;

    protected $table = 'transportadoras';

    /**
     * @return BelongsTo
     */
    public function servico(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Servico::class);
    }
}
