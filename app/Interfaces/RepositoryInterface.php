<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    /**
     * Get All Categories
     *
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator;
}
