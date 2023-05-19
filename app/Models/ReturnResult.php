<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ReturnResult extends Model
{
    use HasFactory;
    function saveToDatabase($request, $jsCode) {
        // Save the JS file to the cache
        $uniqueKey = Str::uuid()->toString();
        Cache::put($uniqueKey, $jsCode);
        getCodeFromDB($uniqueKey);
    }

    function getCodeFromDB ( $uniqueKey) {
        $usersData = Cache::get('value');
        Log::info('$usersDataの内容：'.$usersData);
    }
}
