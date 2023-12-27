<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
class AuthController extends Controller
{
    private $githubUserId;

    public function redirect(Request $request)
    {
        $key = Str::uuid()->toString();
        $usersKey = Str::uuid()->toString();
        Redis::set($key, $usersKey);
        Redis::expire($key, 7200);
        return redirect('http://localhost:3000/exam/'.$usersKey.'&key='.$key);
    }
}
