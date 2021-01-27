<?php

declare(strict_types=1);

namespace App\Services\Comment;

use App\DTO\Comment;
use Illuminate\Database\Eloquent\Model;

interface CommentManagerContract
{
    /**
     * @return array
     */
    public function getAggregated(): array;

    /**
     * @param  Comment  $comment
     * @return Model
     */
    public function create(Comment $comment): Model;
}
