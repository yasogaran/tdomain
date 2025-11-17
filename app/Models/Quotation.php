<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'service_type',
        'budget',
        'description',
        'timeline',
        'status',
        'notes',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
