<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'date',
        'description',
    ];

    public function damageEvents(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'events');
    }
}
