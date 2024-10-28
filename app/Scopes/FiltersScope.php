<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FiltersScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->when(request()->filled('category'), static function (Builder $query) {
            return $query->whereRelation('categories', 'category_id', request('category'));
        })
        ->when(request()->filled('sort_by'), static function (Builder $query) use ($model) {
            return in_array(request('sort_by'), $model->sortable)
                ? $query->orderBy(request('sort_by'), request('order') ?? 'desc')
                : $query;
        });
    }
}
