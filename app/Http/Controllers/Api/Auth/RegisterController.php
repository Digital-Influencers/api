<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Auth\RegisterRequest;

class RegisterController extends AuthController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $registerRequest)
    {
        //
    }
}
