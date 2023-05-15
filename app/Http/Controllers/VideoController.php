<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::with('comments','tags')->get();
        dd($videos);
    }
}
