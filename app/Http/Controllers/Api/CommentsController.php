<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\DTO\Comment;
use App\Services\Comment\CommentManagerContract;
use App\Http\Requests\Comment\StoreComment;
use Illuminate\Http\JsonResponse;
use Exception;

class CommentsController extends ApiController
{
    /**
     * @param  CommentManagerContract  $comment
     * @return JsonResponse
     */
    public function index(CommentManagerContract $comment): JsonResponse
    {
        try {
            return $this->response->json($comment->getAggregated(), JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            return $this->response->json(['message' => $e->getMessage()], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param  StoreComment  $request
     * @param  CommentManagerContract  $comment
     * @return JsonResponse
     */
    public function store(StoreComment $request, CommentManagerContract $comment): JsonResponse
    {
        $commentDto = Comment::fromRequest($request);
        try {
            $newComment = $comment->create($commentDto);

            return $this->response->json($newComment, JsonResponse::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->response->json(['message' => $e->getMessage()], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
