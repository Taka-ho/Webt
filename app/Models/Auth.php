<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Auth extends Model
{
    use HasFactory;
    function countFiles () {
        $allWorkBook = Storage::directories('workBook');
        $numOfWorkBook = count($allWorkBook);
        return $numOfWorkBook;
    }

    function download () {
        $min = 1;
        $max = $this->countFiles();
        $numOfWork = rand($min, $max);
        $workBookName = $numOfWork.'_exam';
        Storage::download('workBook/'.$workBookName.'/exam.zip');
    }

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
}
