<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Link extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function linkGroup(): BelongsTo
    {
        return $this->belongsTo(LinkGroup::class);
    }

    public function icon(): MorphOne
    {
        return $this->morphOne(Icon::class, 'iconable');
    }
}
