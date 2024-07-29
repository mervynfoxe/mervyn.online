<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property string $name
 * @property string $domain
 * @property bool $shuffle_descriptors
 * @property HasMany $linkGroups
 * @property HasManyThrough $links
 * @property HasMany $descriptors
 * @property HasMany $configs
 */
class Environment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function get(int $id): Environment {
        return self::find($id);
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
