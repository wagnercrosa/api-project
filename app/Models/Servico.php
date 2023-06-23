<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';

    /**
     * @return BelongsTo
     */
    public function transportadora(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transportadora::class, 'id_transportadora');
    }
}
