<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnResult;

class ReturnResultController extends Controller
{
    public function upload(Request $request)
    {
        $upload = new ReturnResult();
        // レスポンスを返す
        if ($request->hasFile('file')) {
            $jsCode = file_get_contents($request->file('file')->getRealPath());
            // ファイルを変数に格納する処理
            return $upload->saveToDatabase($request, $jsCode);
        } else {
            return response()->json(['message' => 'ファイルが無いようです。CURL文を確認してください。']);
        }
    }
}
