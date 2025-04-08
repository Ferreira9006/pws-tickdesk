<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::get();

        return view('admin.level.index', ['levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        *
        * Opção do professor para criar o objeto Level
        *

        $level = new Level();
        $level->name = $request->name;
        $level->status = $request->status;
        $level->save(); */

        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:levels',
            'status' => 'required|in:active,inactive'
        ]);

        Level::create([
            'name' => $validatedData['name'],
            'status' => $validatedData['status']
        ]);
        
        return redirect()->route('admin.level.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($level = Level::find($id)) {
            return view('admin.level.show', ['level' => $level]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $level = Level::findOrFail($id);
        return view('admin.level.edit', ['level' => $level]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3|unique:levels',
            'status' => 'required|in:active,inactive'
        ]);

        $level = Level::findOrFail($id);
        
        $level->update([
            'name' => $validatedData['name'],
            'status' => $validatedData['status']
        ]);
        return redirect()->route('admin.level.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $levels = Level::findorFail($id);
        $levels->delete();

        return redirect()->route('admin.level.index');
    }
}