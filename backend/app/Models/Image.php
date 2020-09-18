<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    use HasFactory;

    protected $fillable = ['file_name'];

    public function imageable() :\Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
