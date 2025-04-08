<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::get();

        return view('admin.priority.index', ['priorities' => $priorities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.priority.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        *
        * Opção do professor para criar o objeto Priority
        *

        $priority = new Priority();
        $priority->name = $request->name;
        $priority->status = $request->status;
        $priority->save(); */

        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:priorities',
            'status' => 'required|in:active,inactive'
        ]);

        Priority::create([
            'name' => $validatedData['name'],
            'status' => $validatedData['status']
        ]);
        
        return redirect()->route('admin.priority.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($priority = Priority::find($id)) {
            return view('admin.priority.show', ['priority' => $priority]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $priority = Priority::findOrFail($id);
        return view('admin.priority.edit', ['priority' => $priority]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:priorities',
            'status' => 'required|in:active,inactive'
        ]);

        $priority = Priority::findOrFail($id);
        
        $priority->update([
            'name' => $validatedData['name'],
            'status' => $validatedData['status']
        ]);
        return redirect()->route('admin.priority.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $priorities = Priority::findorFail($id);
        $priorities->delete();

        return redirect()->route('admin.priority.index');
    }
}
