<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $label
 * @property bool $active
 * @property BelongsTo $environment
 */
class Descriptor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getFromEnvironment(int $env_id): array {
        return self::where('environment_id', $env_id)->get()->all();
    }

    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }
}
