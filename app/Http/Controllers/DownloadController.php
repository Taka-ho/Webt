<?php

namespace App\Http\Controllers;

use App\Models\Download;

class DownloadController extends Controller
{
    function download () {
        $download = new Download;
        return $download->download();
    }
}
