<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categorys = Category::all();
        return response()->json([
            'success' => true,
            'message' => 'Cate Data successfully',
            'result' => $categorys
        ], 200);
        // return view('category.view_category',compact('categorys'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = '';

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('category_images', $filename);
        }
        $category = Category::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'image'         => $filename,
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'Category inserted successfully.',
            'data' => $category,
        ], 201);
        // return redirect()->route('category')->with('success', 'Category inserted successfully.');
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
         ]);

        $category = Category::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('category_images', $filename);
            $category->image = $filename;
        }

        // Update category name
        $category->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'image' => $filename,
         ]);

         return response()->json([
            'success' => true,
            'message' => 'Language updated successfully',
            'result' => $category
        ], 200);

        // return redirect()->route('category')->with('success', 'Category updated successfully.');
    }

    public function UpdateStatus(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->status = $request->input('status');
        $category->save();

        // You can return a response if needed
        return response()->json(['message' => 'Category status updated successfully']);
    }


}
