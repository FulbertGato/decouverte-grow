<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('pages.video.list', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.video.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'video' => 'required|mimes:mp4',
            'image' => 'required|mimes:jpg,jpeg,png',
            'auteur' => 'required|max:255',
        ],
        [
            'title.required' => 'Please enter a title',
            'title.max' => 'Title cannot be more than 255 characters',
            'description.required' => 'Please enter a description',
            'description.max' => 'Description cannot be more than 255 characters',
            'video.required' => 'Please upload a video',
            'video.mine' => 'Please upload a valid video',
            'image.required' => 'Please upload an image',
            'image.mine' => 'Please upload a valid image',
        ]
    );
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/videos/'), $imageName);
        $videoName = time().'.'.$request->video->getClientOriginalExtension();
        $request->video->move(public_path('uploads/videos/'), $videoName);
        $video = new Video;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->video = 'uploads/videos/'.$videoName;
        $video->image = 'uploads/videos/'.$imageName;
        $video->author = $request->auteur;
        $video->save();
        return redirect()->route('videos.list')->with('success', 'Video added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('pages.video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('pages.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'video' => 'mimes:mp4',
            'image' => 'mimes:jpg,jpeg,png',
            'auteur' => 'required|max:255',
        ],
        [
            'title.required' => 'Please enter a title',
            'title.max' => 'Title cannot be more than 255 characters',
            'description.required' => 'Please enter a description',
            'description.max' => 'Description cannot be more than 255 characters',
            'video.mine' => 'Please upload a valid video',
            'image.mine' => 'Please upload a valid image',
        ]
    );
        if($request->hasFile('image')){
            //delete the old image
            $oldImage = $video->image;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/videos/'), $imageName);
            $video->image = 'uploads/videos/'.$imageName;
        }
        if($request->hasFile('video')){
            //delete the old video
            $oldVideo = $video->video;
            if(file_exists($oldVideo)){
                unlink($oldVideo);
            }
            $videoName = time().'.'.$request->video->getClientOriginalExtension();
            $request->video->move(public_path('uploads/videos/'), $videoName);
            $video->video = 'uploads/videos/'.$videoName;
        }
        $video->title = $request->title;
        $video->description = $request->description;
        $video->author = $request->auteur;
        $video->save();
        return redirect()->route('videos.list')->with('success', 'Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $oldImage = $video->image;
        if(file_exists($oldImage)){
            unlink($oldImage);
        }

        $oldVideo = $video->video;
        if(file_exists($oldVideo)){
            unlink($oldVideo);
        }
        $video->delete();
        return redirect()->route('videos.list')->with('success', 'Video deleted successfully');
    }
}
