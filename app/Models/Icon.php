<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $path
 * @property string $alt_text
 */
class Icon extends Model
{
    use HasFactory;

    protected $guarded = [];
}
