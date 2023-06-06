<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CheckIdController extends Controller
{
    //
    function CheckId(Request $request)
    {
        return response()->json(['status' => 'リクエストの中身']);
    }
}

