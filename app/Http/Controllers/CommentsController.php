<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    public function index()
    {
        $posts = Comment::with('childrenRecursive')->whereNull('parent_id')->get();

        return response()->json($posts);
    }
}
