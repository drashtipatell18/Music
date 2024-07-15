<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albums;

class AlbumController extends Controller
{
    public function albums(){
        $artists = Albums::all();
        return response()->json([
            'success' => true,
            'message' => 'Artist Data successfully',
            'result' => $artists
        ], 200);    }

    public function storeAlbum(Request $request){
        $request->validate([
            'artist_name' => 'required|string|max:255',
            'albums_name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        // Handle file upload
        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        // Create a new language record
        $albums = Albums::create([
            'artist_name' => $request->input('artist_name'),
            'albums_name' => $request->input('albums_name'),
            'status' => $request->input('status'),
            'image' => $filename,
        ]);
        // Check if the  request expects JSON response
        return response()->json([
            'success' => true,
            'message' => 'Albums Insert successfully',
            'result' => $albums
        ], 200);
    }

    public function updateAlbum(Request $request, $id){
        $request->validate([
            'artist_name' => 'required|string|max:255',
            'albums_name' => 'required|string|max:255',
            'status' => 'required',
        ]);
        $album = Albums::find($id);

        $filename = $album->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        $album->update([
            'artist_name' => $request->input('artist_name'),
            'albums_name' => $request->input('albums_name'),
            'status' => $request->input('status'),
            'image' => $filename,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Album updated successfully',
            'result' => $album
        ], 200);
    }

    public function AlbumUpdateStatus(Request $request, $id)
    {
        $album = Albums::findOrFail($id);
        $album->status = $request->input('status');
        $album->save();

        // You can return a response if needed
        return response()->json([
            'success' => true,
            'message' => 'Album status updated successfully',
            'result' => $album
        ], 200);
    }
}

