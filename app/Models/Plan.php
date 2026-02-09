<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'insurance_id',
        'name',
        'price',
        'description',
        'duration',
        'active',
    ];

    // Relação com Insurance
    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }
}
