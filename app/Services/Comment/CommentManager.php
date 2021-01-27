<?php

declare(strict_types=1);

namespace App\Services\Comment;

use App\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;

class CommentManager implements CommentManagerContract
{
    /**
     * @var CommentRepository
     */
    protected $commentRepository;

    /**
     * CommentManager constructor.
     * @param  CommentRepository  $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @return array
     */
    public function getAggregated(): array
    {
        $comments = $this->commentRepository->findAll();

        return $this->aggregate($comments);
    }

    /**
     * @param  Collection  $comments
     * @param  int|null  $parentId
     * @return array
     */
    private function aggregate(Collection $comments, ?int $parentId = null): array
    {
        $children = [];
        foreach ($comments as $comment) {
            $commentArray = $comment->toArray();
            if ($commentArray['parent_id'] === $parentId) {
                $commentArray['children_recursive'] = $this->aggregate($comments, $commentArray['id']);
                $children[] = $commentArray;
            }
        }

        return $children;
    }
}
