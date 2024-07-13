<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
   public function language(Request $request)
   {
      $languages = Language::all();
      return response()->json([
         'success' => true,
         'message' => 'Language Data successfully',
         'result' => $languages
     ], 200);
     
   }
   public function languageInsert(Request $request)
   {
       // Validate the request data
       $request->validate([
           'name' => 'required|string|max:255',
           'status' => 'required|string|max:255',
       ]);
   
       // Handle file upload
       $filename = '';
       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
           $image->move('images', $filename);
       }
   
       // Create a new language record
       $language = Language::create([
           'name' => $request->input('name'),
           'status' => $request->input('status'),
           'image' => $filename,
       ]);
       // Check if the  request expects JSON response
       return response()->json([
         'success' => true,
         'message' => 'Language Insert successfully',
         'result' => $language
     ], 200);
   }
      
   public function languageUpdate(Request $request, $id)
   {
      $request->validate([
         'name' => 'required|string|max:255',
         'status' => 'required|string|max:255',
      ]);
      $language = Language::find($id);

      $filename = $language->image;
      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $image->move('images', $filename);
      }

      $language->update([
         'name' => $request->input('name'),
         'status' => $request->input('status'),
         'image' => $filename,
      ]);

      return response()->json([
         'success' => true,
         'message' => 'Language updated successfully',
         'result' => $language
     ], 200);
   }

   public function UpdateStatus(Request $request,$id)
    {
        $language = Language::findOrFail($id);
        $language->status = $request->input('status');
        $language->save();

        // You can return a response if needed
        return response()->json(['message' => 'Language status updated successfully']);
    }
   
}
