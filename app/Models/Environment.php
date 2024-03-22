<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Environment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function linkGroups()
    {
        return $this->hasMany(LinkGroup::class);
    }

    public function links()
    {
        return $this->hasManyThrough(Link::class, LinkGroup::class);
    }
}
