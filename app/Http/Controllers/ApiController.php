<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;

abstract class ApiController extends Controller
{
    /**
     * @var ResponseFactory
     */
    protected $response;

    /**
     * ApiController constructor.
     *
     * @param  ResponseFactory  $response
     */
    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }
}
