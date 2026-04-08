<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'bill_number',
        'summary',
        'content_html',
        'attachments_json',
        'effective_date',
        'status',
        'created_by',
    ];

    protected $casts = [
        'attachments_json' => 'array',
        'effective_date' => 'date',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
