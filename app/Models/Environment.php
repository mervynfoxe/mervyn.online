<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property string $name
 * @property HasMany $linkGroups
 * @property HasManyThrough $links
 * @property HasMany $descriptors
 * @property HasMany $configs
 */
class Environment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getCurrent(): Environment {
        // TODO add logic to actually check domain against environments table
        return self::find(1);
    }

    public function linkGroups(): HasMany
    {
        return $this->hasMany(LinkGroup::class);
    }

    public function links(): HasManyThrough
    {
        return $this->hasManyThrough(Link::class, LinkGroup::class);
    }

    public function descriptors(): HasMany
    {
        return $this->hasMany(Descriptor::class);
    }

    public function configs(): HasMany
    {
        return $this->hasMany(Config::class);
    }
}
