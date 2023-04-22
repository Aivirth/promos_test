<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipi';


    public function clienti() {
        return $this->belongsToMany(Cliente::class, 'clienti_tipi_pivot');
    }
}
