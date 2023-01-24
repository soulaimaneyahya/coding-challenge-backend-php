<?php

namespace App\Models;

use App\Scopes\FiltersScope;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];
    public $sortable = [
        'name', 'price'
    ];

    /**
     * each prouct has one image using morphOne relationship
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * categories many-to-many relationship
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }


    public static function boot()
    {
        parent::boot();
        // register global scopes
        static::addGlobalScope(new FiltersScope);
        static::addGlobalScope(new LatestScope);
    }
}
