<?php

namespace App\DTO;

use Illuminate\Http\Request;

interface CanReadFromRequest
{
    public static function fromRequest(Request $request): self;
}
