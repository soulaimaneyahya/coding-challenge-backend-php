<?php

namespace App\Models;

use Carbon\Carbon;
use App\Scopes\LatestScope;
use App\Scopes\FiltersScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const TABLE = 'products';
    public const ID_COLUMN = 'id';

    public const NAME_COLUMN = 'name';
    public const DESCRIPTION_COLUMN = 'description';
    public const PRICE_COLUMN = 'price';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    protected $fillable = [
        self::NAME_COLUMN,
        self::DESCRIPTION_COLUMN,
        self::PRICE_COLUMN,
    ];

    public $sortable = [
        self::NAME_COLUMN, self::PRICE_COLUMN
    ];

    protected $casts = [
        self::PRICE_COLUMN => 'float',
    ];

    /**
     * Get the product's ID.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    /**
     * Get the product's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(self::NAME_COLUMN);
    }

    /**
     * Get the product's description.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getAttribute(self::DESCRIPTION_COLUMN);
    }

    /**
     * Get the product's price.
     *
     * @return float
     */
    public function getPrice(): float
    {
        return (float) $this->getAttribute(self::PRICE_COLUMN);
    }

    /**
     * Get the product's created at timestamp.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute(self::CREATED_AT_COLUMN);
    }

    /**
     * Get the product's updated at timestamp.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute(self::UPDATED_AT_COLUMN);
    }

    /**
     * Get the product's deleted at timestamp.
     *
     * @return Carbon|null
     */
    public function getDeletedAt(): ?Carbon
    {
        return $this->getAttribute(self::DELETED_AT_COLUMN);
    }

    /**
     * Each product has one image using morphOne relationship.
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Categories many-to-many relationship.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public static function boot()
    {
        parent::boot();
        // Register global scopes
        static::addGlobalScope(new FiltersScope);
        static::addGlobalScope(new LatestScope);
    }
}
