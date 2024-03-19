<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //index
   public function index()
   {
        $categories = Category::paginate(10);
        return view('pages.categories.index', compact('categories'));
   }

   // create
   public function create()
   {
        $categories = Category::paginate(10);
        return view('pages.categories.create');
   }

   // store
   public function store(Request $request)
   {
        // validate the request...
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        // store the request...
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

     // save image
     if($request->hasFile('image')){
        $image = $request->file('image');
        $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
        $category->image = 'storage/categories/' . $category->id . '.' . $image->getClientOriginalExtension();
        $category->save();

    }
    return redirect()->route('categories.index')->with('success', 'Category store successfully');
   }

   // edit
   public function edit($id)
   {
    $category = Category::find($id);
    return view('pages.categories.edit', compact('category'));
   }

   // updated
   public function update(Request $request, $id)
   {
       // validate the request...
   $request->validate([
       'name' => 'required',
      // 'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
   ]);
//

    // store the request...
    $category = new Category;
    $category->name = $request->name;
    $category->description = $request->description;

    // save image
    if($request->hasFile('image')){
        $image = $request->file('image');
        $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
        $category->image = 'storage/categories/' . $category->id . '.' . $image->getClientOriginalExtension();
        $category->save();

    }
    return redirect()->route('categories.index')->with('success', 'Category updated successfully');
   }


   // destroy
   public function destroy($id)
   {
      // delete the request...
      $category = Category::find($id);
      $category->delete();

      return redirect()->route('products.index')->with('success', 'Category deleted successfully');
    }
}
