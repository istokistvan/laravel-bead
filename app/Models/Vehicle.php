<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'license',
        'brand',
        'type',
        'creationYear',
        'picture'
    ];

    public function damageEvents(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'events');
    }
}
