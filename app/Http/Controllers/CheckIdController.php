<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
class CheckIdController extends Controller
{
    function CheckId(Request $request)
    {
        $userId = $request->id;
        $idKey = "user_id:$$userId";
        $value = Redis::get($idKey);

        if ($value !== null) {
            return response()->json([true]);
        } else {
            return response()->json([false]);
        }
    }
}
