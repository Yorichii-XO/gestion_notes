<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Note;
class CategoryController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
{
    $categories = Category::where('user_id', auth()->id())->paginate(10); // Adjust the number to however many items you want per page
    return view('categories.index', compact('categories'));
}

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        Category::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('categories.index');
    }

    public function show(Category $category, Request $request)
    {
        $search = $request->query('search');
        $query = $category->notes()->where('user_id', auth()->id());

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $notes = $query->get();
        return view('categories.show', compact('category', 'notes'));
    }
    public function edit(Category $category)
    {
        // No authorization check needed
        return view('categories.edit', compact('category'));
    }
    
    public function update(Request $request, Category $category)
    {
        // No authorization check needed
    
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Update the category
        $category->name = $request->name;
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category); // Authorize user to delete category
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }


}
