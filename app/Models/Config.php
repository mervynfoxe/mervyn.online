<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $config_name
 * @property string $value
 * @property BelongsTo $environment
 */
class Config extends Model
{
    use HasFactory;

    protected $table = 'config';

    protected $guarded = [];

    public static function get($key, $environment = NULL, $return_model = FALSE): string|Config {
        $environment = $environment ?? Environment::get(config('app.environment.id'));
        $config = self::where('environment_id', $environment->id)->where('config_name', $key)->first();

        if ($return_model) {
            return $config;
        }

        return $config->value;
    }

    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }
}
