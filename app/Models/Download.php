<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    function countFiles () {
        $path = base_path('workBook');
        $getAllFiles = array_values(array_diff(scandir($path), array('..', '.')));
        $numOfFiles = 0;
        if ($getAllFiles != false) {
            $numOfFiles = count($getAllFiles);
        }
        return $numOfFiles;
    }

    function chooseOneFile () {
        $min = 1;
        $max = $this->countFiles();
        $numOfWork = rand($min, $max);
        $this->download ($numOfWork.'.txt');
    }

    function download ($fileName) {
        
    }
}
