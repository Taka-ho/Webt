<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Download extends Model
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
        return Storage::download('workBook/'.$workBookName.'/exam.zip');
    }
}
