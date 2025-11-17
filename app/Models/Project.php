<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'industry',
        'service_type',
        'technology_stack',
        'challenge',
        'solution',
        'results',
        'featured',
        'status',
        'order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function media(): HasMany
    {
        return $this->hasMany(ProjectMedia::class)->orderBy('order');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
