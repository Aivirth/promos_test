<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    use HasFactory;

    protected $table = 'clienti';

    protected $hidden = [
        'password',
        'created_at',
        'updated_at'
    ];

    public function settori() {
        return $this->hasManyThrough(
            Settore::class,
            ClienteSettoriPivot::class,
            'clienti_id',
            'id',
        );

    }
    public function tipo() {
        return $this->hasOne(
            Tipo::class , 'id', 'tipi_id')
            ;

    }
}
