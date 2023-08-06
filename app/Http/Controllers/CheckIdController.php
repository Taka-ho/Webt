<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
class CheckIdController extends Controller
{
    function CheckId(Request $request)
    {
        $userId = $request->id;
        $key = $this->takeKey($userId);
        if (Redis::get($key) != null) {
            return response()->json([true]);
        } else {
            return response()->json([false]);
        }
    }

    public function takeKey($userId)
    {
        $search = strstr($userId, '&key=');
        return substr($search, 5);
    }
}
