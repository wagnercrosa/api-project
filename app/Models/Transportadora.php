<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    use HasFactory;

    protected $table = 'transportadoras';

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
