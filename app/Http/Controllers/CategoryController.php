<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category()
    {
        $categorys = Category::all();
        return view('category.view_category',compact('categorys'));
    }

    public function storeCategory(Request $request)
    {
        $validateRequest = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);

        if ($validateRequest->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validateRequest->errors()
            ], 403);
        }

        $filename = '';

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
        Category::create([
            'category_name' => $request->input('category_name'),
            'image'         => $filename,
        ]);
        return redirect()->route('category')->with('success', 'Category inserted successfully.');
    }
    
    public function categoryUpdate(Request $request, $id)
    {
        $validateRequest = Validator::make($request->all(), [
            'category_name' => 'required',
        ]);

        if ($validateRequest->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validateRequest->errors()
            ], 403);
        }
    
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
            $category->image = $filename;
        }

        // Update category name
        $category->update([
            'category_name' => $request->input('category_name')
        ]);

        return redirect()->route('category')->with('success', 'Category updated successfully.');
    }

    
}
