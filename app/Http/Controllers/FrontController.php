<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Video;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $videos = Video::orderBy('created_at', 'desc')->take(10)->get();
        $video = $videos->random();
        $videos = $videos->except($video->id);
        $podcasts = Podcast::orderBy('created_at', 'desc')->take(10)->get();
        return view('pages.decouverte.home', compact('video', 'videos', 'podcasts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function video(Video $video)
    {
        $videos = Video::orderBy('created_at', 'desc')->get();
        $videos = $videos->except($video->id);
        $videosL = $videos->random(count($videos)/2);
        $videosR = $videos->except($videosL->pluck('id')->toArray());
        return view('pages.decouverte.video', compact('video', 'videosL', 'videosR'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function videoS()
    {
        $video=Video::orderBy('created_at', 'desc')->first();
        $videos = Video::orderBy('created_at', 'desc')->get();
        $videos = $videos->except($video->id);
        $videosL = $videos->random(count($videos)/2);
        $videosR = $videos->except($videosL->pluck('id')->toArray());
        return view('pages.decouverte.video', compact('video', 'videosL', 'videosR'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function podcast()
    {
        $podcast = Podcast::orderBy('created_at', 'desc')->first();
        $podcasts= Podcast::orderBy('created_at', 'asc')->get();
        return view('pages.decouverte.podcast', compact('podcast','podcasts'));
    }
}
