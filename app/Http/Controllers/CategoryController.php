<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Level;
use Illuminate\Foundation\Http\FormRequest;

use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $levels = Level::get();

        return view(
            'admin.category.index', 
            [
                'categories' => $categories, 
                'levels' => $levels,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::get();
        return view('admin.category.create', ['levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:categories',
            'status' => 'required|in:active,inactive',
            'level_id' => 'required|exists:levels,id'
        ]);

        Category::create([
            'name' => $validatedData['name'],
            'status' => $validatedData['status'],
            'level_id' => $validatedData['level_id']
        ]);
        
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($category = Category::find($id)) {
            $levels = Level::get();
            return view('admin.category.show', ['category' => $category], ['levels' => $levels]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $levels = Level::get();
        return view('admin.category.edit', ['category' => $category, 'levels' => $levels]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:categories',
            'status' => 'required|in:active,inactive',
            'level_id' => 'required|exists:levels,id'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $validatedData['name'],
            'status' => $validatedData['status'],
            'level_id' => $validatedData['level_id']
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::findorFail($id);
        $categories->delete();

        return redirect()->route('category.index');
    }
}
