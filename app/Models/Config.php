<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Config extends Model
{
    use HasFactory;

    protected $table = 'config';

    protected $guarded = [];

    public function environment()
    {
        return $this->belongsTo(Environment::class);
    }
}
