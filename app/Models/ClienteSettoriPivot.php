<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClienteSettoriPivot extends Pivot
{
    use HasFactory;


    protected $table = 'clienti_settori_pivot';

    protected $fillable = [
        'clienti_id',
        'settori_id'
    ];
}
