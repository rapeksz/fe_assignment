<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use Exception;
use App\DTO\Comment as CommentDto;
use App\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment implements CommentRepository
{
    /**
     * @var \App\Models\Comment
     */
    private $model;

    /**
     * Comment constructor.
     * @param  \App\Models\Comment  $model
     */
    public function __construct(\App\Models\Comment $model)
    {
        $this->model = $model;
    }

    /**
     * @param  int  $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return $this->newQuery()->find($id);
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->newQuery()->get();
    }

    /**
     * @param  int  $id
     * @throws Exception
     */
    public function removeById(int $id): void
    {
        $this->findById($id)->delete();
    }

    /**
     * @param  CommentDto  $comment
     * @return Model
     */
    public function create(CommentDto $comment): Model
    {
        return $this->newQuery()->create(
            [
                'parent_id' => $comment->getParentId(),
                'body' => $comment->getBody(),
            ]
        );
    }

    /**
     * @param  Model  $model
     * @return bool
     * @throws Exception
     */
    public function update(Model $model): bool
    {
        return $this->findById($model->id)->update($model);
    }

    /**
     * @return Builder
     */
    private function newQuery(): Builder
    {
        return $this->model->newQuery();
    }
}
