<?php

namespace App\Http\Controllers;

use App\Helper\Audio;

use App\Models\Podcast;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::all();
        return view('pages.podcast.list', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.podcast.add');
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
            'auteur' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'audio' => 'required|mimes:mp3',
        ],
        [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'image.required' => 'Image is required',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg,png,jpg,gif,svg',
            'audio.required' => 'Audio is required',
            'audio.mimes' => 'Audio must be a file of type: mp3,wav',
        ]);
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/podcast/'), $imageName);
        $audioName = time().'.'.$request->audio->getClientOriginalExtension();
        $request->audio->move(public_path('uploads/podcast/'), $audioName);
        $podcast = new Podcast;
        $podcast->title = $request->title;
        $podcast->author = $request->auteur;
        $podcast->description = $request->description;
        $podcast->image = 'uploads/podcast/'.$imageName;
        $podcast->audio = 'uploads/podcast/'.$audioName;
        //audio duration
        $duration = $this->getAudioDuration('uploads/podcast/'.$audioName);
        $podcast->duration =  CarbonInterval::seconds($duration)->cascade()->forHumans();

        $podcast->save();
        return redirect()->route('podcasts.list')->with('success', 'Podcast created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        $podcast = Podcast::find($podcast->id);
        return view('pages.podcast.show', compact('podcast'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $podcast)
    {
        $podcast = Podcast::find($podcast->id);
        return view('pages.podcast.edit', compact('podcast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcast $podcast)
    {
        

        $request->validate([
            'title' => 'required|max:255',
            'auteur' => 'required|max:255',
            'description' => 'required|max:255',
            'new_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            'new_audio' => 'mimes:mp3',
        ],
        [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'new_image.image' => 'Image must be an image',
            'new_image.mimes' => 'Image must be a file of type: jpeg,png,jpg,gif,svg',
            'new_audio.mimes' => 'Audio must be a file of type: mp3,wav',
        ]);
        $podcast = Podcast::find($podcast->id);
        $podcast->title = $request->title;
        $podcast->author = $request->auteur;
        $podcast->description = $request->description;
        if($request->hasFile('new_image')){
            //remove the old image
            if(file_exists($podcast->image)){
                unlink($podcast->image);
            }
            $imageName = time().'.'.$request->new_image->getClientOriginalExtension();
            $request->new_image->move(public_path('uploads/podcast/'), $imageName);
            $podcast->image = 'uploads/podcast/'.$imageName;

        }
        if($request->hasFile('new_audio')){
            //remove the old image
            if(file_exists($podcast->audio)){
                unlink($podcast->audio);
            }
            $audioName = time().'.'.$request->new_audio->getClientOriginalExtension();
            $request->new_audio->move(public_path('uploads/podcast/'), $audioName);
            $podcast->audio = 'uploads/podcast/'.$audioName;
            $duration = $this->getAudioDuration('uploads/podcast/'.$audioName);

            $podcast->duration =  CarbonInterval::seconds($duration)->cascade()->forHumans();
           // dd($podcast->duration);

        }
        $podcast->save();
        return redirect()->route('podcasts.list')->with('success', 'Podcast updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $podcast)
    {
        //delete podcast
        $podcast = Podcast::find($podcast->id);
        if(file_exists($podcast->image)){
            unlink($podcast->image);
        }
        if(file_exists($podcast->audio)){
            unlink($podcast->audio);
        }
        $podcast->delete();
        return redirect()->route('podcasts.list')->with('success', 'Podcast deleted successfully');
    }

    public function getAudioDuration($file)
    {
        $mp3file = new Audio($file);
        $duration = $mp3file->getDuration();
        return $duration;

    }
}
