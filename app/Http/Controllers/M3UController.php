<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class M3UController extends Controller
{
    public function generateM3U()
    {
        $videos = Video::all();
        $m3u = "#EXTM3U\n\n";

        foreach ($videos as $video) {
            $m3u .= "#EXTINF:-1, {$video->title}\n";
            $m3u .= "{$video->url}\n\n";
        }

        return response($m3u)
            ->header('Content-Type', 'audio/x-mpegurl');
    }
}
