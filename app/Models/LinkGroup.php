<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LinkGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function environment()
    {
        return $this->belongsTo(Environment::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function icon()
    {
        return $this->morphOne(Icon::class, 'iconable');
    }
}
