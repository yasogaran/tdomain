<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'department',
        'photo_path',
        'bio',
        'email',
        'linkedin_url',
        'order',
    ];

    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department)->orderBy('order');
    }
}
