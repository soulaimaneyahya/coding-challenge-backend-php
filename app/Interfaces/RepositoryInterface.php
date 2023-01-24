<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    /**
     * Get All Categories
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Get Parent Categories
     *
     * @return Collection
     */
    public function parentCategories(): Collection;
}
