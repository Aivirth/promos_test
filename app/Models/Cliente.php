<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    use HasFactory;

    protected $table = 'clienti';

    protected $fillable = [

        'ragione_sociale',
        'password',
        'tipi_id',
        'email',
        'username',
        'indirizzo',
        'inizio_attivita',
        'piva',
        'telefono',
        'note',
        'cf',
        'rating',
        'attach_visura_camerale'

    ];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];

    public function settori() {
        return $this->hasManyThrough(
            Settore::class,
            ClienteSettoriPivot::class,
            'clienti_id',
            'id',
            'id',
            'settori_id'
        );

    }
    public function tipo() {
        return $this->hasOne(
            Tipo::class, 'id', 'tipi_id')
        ;

    }
}
