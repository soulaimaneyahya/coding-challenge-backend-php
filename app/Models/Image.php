<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['path'];

    /**
     * imageable morphTo relationship
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * Get Product Url
     * @return string
     */
    public function url(): string
    {
        return Storage::url($this->path);
    }
}
