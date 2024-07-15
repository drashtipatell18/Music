<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicVideo;
use Illuminate\Support\Facades\Validator;

class MusicVideoController extends Controller
{
    public function music_videos()
    {
        $musicVideo = MusicVideo::all();
        return response()->json([
            'success' => true,
            'message' => 'Cate Data successfully',
            'result' => $musicVideo
        ], 200);
        // return view('music_videos.view_musicvideos');
    }
    public function musicVideosInsert(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'album_id' => 'required',
            'artist_id' => 'required',
            'category_id' => 'required',
            'language_id' => 'required',
            'type' => 'nullable|string',
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        $filename = '';

        if ($request->hasFile('icons')) {
            $image = $request->file('icons');
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

        return response()->json(['message' => 'Music video created successfully', 'data' => $musicVideo], 201);


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

        if ($request->hasFile('icons')) {
            $image = $request->file('icons');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('music_images', $filename);
            $musicVideo->image = $filename;
        }

        // Update category name
        $musicVideo->update([
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
        return response()->json(['message' => 'MusicVideo status updated successfully']);
    }

}
