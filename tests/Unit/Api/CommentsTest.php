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
        $commentModelMock = Mockery::mock(Model::class);

        $requestData = [
            'parent_id' => 1,
            'body' => 'test',
        ];

        $commentModelMock->shouldReceive('toJson')
            ->once()
            ->andReturn(json_encode($requestData));

        $this->commentManagerMock
            ->shouldReceive('create')
            ->once()
            ->andReturn($commentModelMock);

        $this->app->instance(Model::class, $commentModelMock);

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        )->json(
            'POST',
            '/api/comments',
            $requestData
        );

        $response->assertStatus(JsonResponse::HTTP_CREATED);
    }
}
