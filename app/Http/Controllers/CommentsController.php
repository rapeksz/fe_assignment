<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CommentsController extends Controller
{
    public function index()
    {
        return response()->json('here must be list of comments');
    }
}
