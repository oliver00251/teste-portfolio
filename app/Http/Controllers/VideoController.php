<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function index()
    {
        return response()->json(Video::all());
    }

    public function store(Request $request)
    {
        $video = Video::create($request->all());
        return response()->json($video, 201);
    }

    public function show($id)
    {
        return response()->json(Video::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->update($request->all());
        return response()->json($video);
    }

    public function destroy($id)
    {
        Video::destroy($id);
        return response()->json(['message' => 'Vídeo deletado']);
    }
}
