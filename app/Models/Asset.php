<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    protected $fillable = [
        'name',
        'serial_number',
        'status',
    ];

    /**
     * Get the inspections for the asset.
     */
    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }
}
