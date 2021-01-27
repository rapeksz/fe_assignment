<?php

declare(strict_types=1);

namespace App\Services\Comment;

use Illuminate\Database\Eloquent\Collection;

interface CommentManagerContract
{
    /**
     * @return array
     */
    public function getAggregated(): array;
}
