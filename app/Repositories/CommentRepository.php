<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CommentRepository
{
    /**
     * @param  int  $id
     * @return Model
     */
    public function findById(int $id): Model;

    /**
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * @param  int  $id
     */
    public function removeById(int $id): void;

    /**
     * @param  Model  $model
     * @return Model
     */
    public function create(Model $model): Model;

    /**
     * @param  Model  $model
     * @return bool
     */
    public function update(Model $model): bool;
}
