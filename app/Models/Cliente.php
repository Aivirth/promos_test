<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    use HasFactory;

    protected $table = 'clienti';

    protected $hidden = [
        'password',
    ];

    public function settori() {
        return $this->hasMany(Settore::class, 'clienti_settori_pivot');

    }
    public function tipo() {
        return $this->hasMany(Tipo::class, 'clienti_tipi_pivot');
    }
}
