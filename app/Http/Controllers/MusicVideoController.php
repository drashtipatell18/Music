<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicVideo;
use Illuminate\Support\Facades\Validator;

class MusicVideoController extends Controller
{
    public function music_videos()
    {
        $musicVideo = MusicVideo::with(['artist', 'album', 'category', 'language'])->get();
        foreach ($musicVideo as $m) {
            if($m->type == 'video')
            {
                $m->url = "/music_images/" . $m->icons;
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Music & Video Data successfully',
            'result' => $musicVideo
        ], 200);
        // return view('music_videos.view_musicvideos');
    }

    public function getSingle($id)
    {
        $musicVideo = MusicVideo::with(['artist', 'album', 'category', 'language'])->find($id);
        if($musicVideo->type == 'video')
        {
            $musicVideo->url = "/music_images/" . $musicVideo->icons;
        }
        return response()->json([
            'success' => true,
            'message' => 'Music & Video Data successfully',
            'result' => $musicVideo
        ], 200);
    }
    public function musicVideosInsert(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'album_id' => 'required',
            'artist_id' => 'required',
            'category_id' => 'required',
            'language_id' => 'required',
            'type' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        $filename = '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('music_images', $filename);
        }


        $musicVideo = MusicVideo::create([
            'name' => $request->input('name'),
            'artist_id' => $request->input('artist_id'),
            'album_id' =>  $request->input('album_id'),
            'category_id' =>  $request->input('category_id'),
            'language_id' =>  $request->input('language_id'),
            'icons' =>  $filename,
            'type' =>   $request->input('type'),
            'url' =>  $request->input('url'),
            'status' => $request->input('status'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Music video created successfully', 
            'result' => $musicVideo
        ], 201);


    }
    public function musicVideosUpdate(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'album_id' => 'required',
            'artist_id' => 'required',
            'category_id' => 'required',
            'language_id' => 'required',
            'type' => 'nullable|string',
            'url' => 'required|url',
        ]);

        $musicVideo = MusicVideo::find($id);

        $filename = '';

        if ($request->hasFile('icons')) {
            $image = $request->file('icons');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('music_images', $filename);
            $musicVideo->image = $filename;
        }

        if($filename == '')
        {
            // Update category name
            $musicVideo->update([
                'name' => $request->input('name'),
                'artist_id' => $request->input('artist_id'),
                'album_id' =>  $request->input('album_id'),
                'category_id' =>  $request->input('category_id'),
                'language_id' =>  $request->input('language_id'),
                'type' =>   $request->input('type'),
             ]);
        }
        else
        {
            // Update category name
            $musicVideo->update([
                'name' => $request->input('name'),
                'artist_id' => $request->input('artist_id'),
                'album_id' =>  $request->input('album_id'),
                'category_id' =>  $request->input('category_id'),
                'language_id' =>  $request->input('language_id'),
                'type' =>   $request->input('type'),
                'icons' => $filename,
                'url' => '/music_images/' . $filename
            ]);
        }

         return response()->json([
            'success' => true,
            'message' => 'Music Video updated successfully',
            'result' => $musicVideo
        ], 200);

    }

    public function UpdateStatus(Request $request,$id)
    {

        $musicVideo = MusicVideo::findOrFail($id);

        $musicVideo->status = $request->input('status');
        $musicVideo->save();

        // You can return a response if needed
        return response()->json([
            'success' => true,
            'message' => 'MusicVideo status updated successfully',
            'result' => $musicVideo
        ]);
    }

}
