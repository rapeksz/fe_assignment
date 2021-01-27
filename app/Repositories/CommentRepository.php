<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\DTO\Comment;

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
     * @param  Comment  $comment
     * @return Model
     */
    public function create(Comment $comment): Model;

    /**
     * @param  Model  $model
     * @return bool
     */
    public function update(Model $model): bool;
}
