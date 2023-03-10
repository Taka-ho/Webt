<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    function index () {
        $download = new Download;
        return $download->download();
    }
}
