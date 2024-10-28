<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const TABLE = 'categories';
    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';
    public const PARENT_CATEGORY_ID_COLUMN = 'parent_category_id';

    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';
    public const DELETED_AT_COLUMN = 'deleted_at';

    protected $fillable = [
        self::NAME_COLUMN,
        self::PARENT_CATEGORY_ID_COLUMN,
    ];

    /**
     * Get the category's ID.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    /**
     * Get the category's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(self::NAME_COLUMN);
    }

    /**
     * Get the parent category ID.
     *
     * @return string
     */
    public function getParentCategoryId(): string
    {
        return $this->getAttribute(self::PARENT_CATEGORY_ID_COLUMN);
    }

    /**
     * Get the category's created at timestamp.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute(self::CREATED_AT_COLUMN);
    }

    /**
     * Get the category's updated at timestamp.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute(self::UPDATED_AT_COLUMN);
    }

    /**
     * Get the category's deleted at timestamp.
     *
     * @return Carbon|null
     */
    public function getDeletedAt(): ?Carbon
    {
        return $this->getAttribute(self::DELETED_AT_COLUMN);
    }

    /**
     * Parent category (null|category)
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, self::PARENT_CATEGORY_ID_COLUMN);
    }

    /**
     * Has many subcategories
     *
     * @return HasMany
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, self::PARENT_CATEGORY_ID_COLUMN);
    }

    /**
     * Products many-to-many relationship
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
