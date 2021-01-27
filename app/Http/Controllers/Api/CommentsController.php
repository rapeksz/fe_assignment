<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Services\Comment\CommentManagerContract;
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
}
