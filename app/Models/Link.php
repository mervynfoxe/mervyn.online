<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function linkGroup()
    {
        return $this->belongsTo(LinkGroup::class);
    }

    public function icon()
    {
        return $this->morphOne(Icon::class, 'iconable');
    }
}
