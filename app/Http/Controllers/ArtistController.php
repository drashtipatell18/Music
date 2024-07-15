<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function artist()
    {
        $artists = Artist::all();
        return response()->json([
            'success' => true,
            'message' => 'Artist Data successfully',
            'result' => $artists
        ], 200);
    }

    public function storeArtist(Request $request)
    {
        $validateRequest = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        if ($validateRequest->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validateRequest->errors()
            ], 403);
        }

        // Handle file upload
        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        // Create a new language record
        $artist = Artist::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $filename,
        ]);
        // Check if the  request expects JSON response
        return response()->json([
            'success' => true,
            'message' => 'Artist Insert successfully',
            'result' => $artist
        ], 200);
    }

    public function ArtistUpdate(Request $request, $id)
    {
        $validateRequest = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        if ($validateRequest->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validateRequest->errors()
            ], 403);
        }
        
        $artist = Artist::find($id);

        $filename = $artist->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        $artist->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'image' => $filename,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Artist updated successfully',
            'result' => $artist
        ], 200);
    }
    public function ArtistUpdateStatus(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->status = $request->input('status');
        $artist->save();

        // You can return a response if needed
        return response()->json([
            'success' => true,
            'message' => 'Artist status updated successfully',
            'result' => $artist
        ], 200);
    }
}
