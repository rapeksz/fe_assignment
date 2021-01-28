<?php

namespace Tests\Unit;

use App\DTO\Comment;
use App\Http\Requests\Comment\StoreComment;
use App\Services\Comment\CommentManagerContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Mockery;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    protected $commentManagerMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->commentManagerMock = Mockery::mock(CommentManagerContract::class);
        $this->app->instance(CommentManagerContract::class, $this->commentManagerMock);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowAllComments()
    {
        $this->commentManagerMock
            ->shouldReceive('getAggregated')
            ->once()
            ->andReturn([]);

        $response = $this->call('GET', '/api/comments');

        $response->assertStatus(JsonResponse::HTTP_OK);
        $this->assertJson($response->getContent());
    }

    public function testCreateComment()
    {
        $commentDtoMock = Mockery::mock(Comment::class);
        $requestMock = Mockery::mock(StoreComment::class);
        $commentModelMock = Mockery::mock(StoreComment::class);

        //TODO: does not mocking fromRequest method properly
//        $requestMock->shouldReceive('input')
//            ->with(['parent_id'])
//            ->once()
//            ->andReturn([1]);

        $requestMock->shouldReceive('passes')
            ->once()
            ->andReturn(true);

        $commentDtoMock->shouldReceive('fromRequest')
            ->with([$requestMock])
            ->once()
            ->andReturn($commentDtoMock);

        $this->commentManagerMock
            ->shouldReceive('create')
            ->with([$commentDtoMock])
            ->once()
            ->andReturn($commentModelMock);

        $this->app->instance(Model::class, $commentModelMock);
        $this->app->instance(StoreComment::class, $requestMock);
        $this->app->instance(Comment::class, $commentDtoMock);

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        )->post(
            '/api/comments'
        );

        $response->assertStatus(JsonResponse::HTTP_CREATED);
    }
}
