<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ParentCategoriesInterface
{
    /**
     * Get Parent Categories
     *
     * @return Collection
     */
    public function parentCategories(): Collection;

    /**
     * get all Categories
     * @return Collection
     */
    public function allCategories(): Collection;
}
