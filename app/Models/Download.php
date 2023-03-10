<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Download extends Model
{
    use HasFactory;
    function countFiles () {
        $allWorkBook = Storage::allFiles('workBook');
        $numOfFiles = count($allWorkBook);
        return $numOfFiles;
    }

    function download () {
        $min = 1;
        $max = $this->countFiles();
        $numOfWork = rand($min, $max);
        $fileName = $numOfWork.'.txt';
        return Storage::download('workBook/'.$fileName);
    }
}
