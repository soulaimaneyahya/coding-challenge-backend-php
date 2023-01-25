<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CategoryCollectionInterface
{
    /**
     * get all Categories
     * @return Collection
     */
    public static function allCategories(): Collection;

    /**
     * Get Parent Categories
     *
     * @return Collection
     */
    public static function parentCategories(): Collection;
}
