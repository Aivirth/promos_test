<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settore extends Model {
    use HasFactory;

    protected $table = 'settori';

    public function clienti() {
        return $this->belongsToMany(Cliente::class, 'clienti_tipi_pivot');

    }
}
