<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Premium;

class PremiumController extends Controller
{

    public function premiums()
    {
        $premiums = Premium::all();
        return response()->json([
            'success' => true,
            'message' => 'Premiums Data successfully',
            'result' => $premiums
        ], 200);
    }

    public function premiumsInsert(Request $request){

        $validateRequest = Validator::make($request->all(), [
            'premium_name' => 'required|string|max:255',
            'price' => 'required',
            'time_perid_days' => 'required',
            'description' => 'required',
            'status' => 'required|string|max:255',
        ]);

        if ($validateRequest->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validateRequest->errors()
            ], 403);
        }

        // Create a new language record
        $premiums = Premium::create([
            'premium_name' => $request->input('premium_name'),
            'price' => $request->input('price'),
            'time_perid_days' => $request->input('time_perid_days'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
        // Check if the  request expects JSON response
        return response()->json([
            'success' => true,
            'message' => 'Premium Insert successfully',
            'result' => $premiums
        ], 200);
    }

    public function premiumsUpdate(Request $request,$id){

        $validateRequest = Validator::make($request->all(), [
            'premium_name' => 'required|string|max:255',
            'price' => 'required',
            'time_perid_days' => 'required',
            'description' => 'required',
            'status' => 'required|string|max:255',
        ]);

        if ($validateRequest->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validateRequest->errors()
            ], 403);
        }

        $premiums = Premium::find($id);

        $premiums->update([
            'premium_name' => $request->input('premium_name'),
            'price' => $request->input('price'),
            'time_perid_days' => $request->input('time_perid_days'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'premium updated successfully',
            'result' => $premiums
        ], 200);
    }
    public function UpdateStatus(Request $request, $id)
    {
        $premiums = Premium::findOrFail($id);
        $premiums->status = $request->input('status');
        $premiums->save();

        // You can return a response if needed
        return response()->json(['message' => 'premium status updated successfully']);
    }
}



