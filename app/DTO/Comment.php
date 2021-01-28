<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\Request;

class Comment implements Dto, CanReadFromRequest
{
    /**
     * @var int|null
     */
    private $parentId;

    /**
     * @var string
     */
    private $body;

    public function __construct(?int $parentId, string $body)
    {
        $this->parentId = $parentId;
        $this->body = $body;
    }

    /**
     * @param  Request  $request
     * @return CanReadFromRequest
     */
    public static function fromRequest(Request $request): CanReadFromRequest
    {
        return new self(
            $request->input('parent_id'),
            (string) $request->input('body')
        );
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}
