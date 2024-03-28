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

    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }
}
