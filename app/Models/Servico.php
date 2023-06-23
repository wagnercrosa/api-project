<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';

    public function transportadora()
    {
        return $this->belongsTo(Transportadora::class, 'id_transportadora');
    }
}
