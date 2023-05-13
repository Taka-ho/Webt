<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnResult;

class ReturnResultController extends Controller
{
    public function upload(Request $request)
    {
        // ファイルを受け取る
        $file = $request->file('file');
        // ファイルの保存先パスを指定する
        $destinationPath = storage_path('app/public/uploads');

        // アップロードされたファイルを指定したパスに保存する
        $file->move($destinationPath, $file->getClientOriginalName());

        // レスポンスを返す
        return response()->json(['message' => 'You completed what is upload file']);
    }
}
