<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class LinkGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function icon(): MorphOne
    {
        return $this->morphOne(Icon::class, 'iconable');
    }
}
