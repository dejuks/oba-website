<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'type',
        'description_html',
        'requirements',
        'attachments_json',
        'application_url',
        'status',
        'publish_at',
        'expire_at',
        'created_by',
    ];

    protected $casts = [
        'attachments_json' => 'array',
        'publish_at' => 'datetime',
        'expire_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->where(function (Builder $inner): void {
                $inner->whereNull('publish_at')->orWhere('publish_at', '<=', now());
            });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
