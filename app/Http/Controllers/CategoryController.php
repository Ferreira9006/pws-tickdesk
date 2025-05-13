<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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

        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        *
        * Opção do professor para criar o objeto Category
        *

        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save(); */

        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:categories',
            'status' => 'required|in:active,inactive'
        ]);

        Category::create([
            'name' => $validatedData['name'],
            'status' => $validatedData['status']
        ]);
        
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($category = Category::find($id)) {
            return view('admin.category.show', ['category' => $category]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:categories',
            'status' => 'required|in:active,inactive'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $validatedData['name'],
            'status' => $validatedData['status']
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
