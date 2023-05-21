<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ReturnResult extends Model
{
    use HasFactory;
    function saveToDatabase($request, $jsCode) {
        // Save the JS file to the cache
        $uniqueKey = Str::uuid()->toString();
        Cache::put($uniqueKey, $jsCode);
        $this->getCodeFromDB($uniqueKey);
    }

    function getCodeFromDB ($uniqueKey) {
        $usersData = Cache::get($uniqueKey);
        $this->unitTest($usersData);
    }

    function unitTest($usersData) {
        
    }
}
