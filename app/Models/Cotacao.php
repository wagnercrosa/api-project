<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cotacao extends Model
{
    use HasFactory;

    protected $table = 'cotacao';

    /**
     * @return BelongsTo
     */
    public function servico(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }
}
