<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;
use App\Models\Category;
use App\Models\Level;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Priority::get();
        $categories = Category::get();

        return view('ticket.create', [
            'priorities' => $priorities, 
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:1000|min:10',
            'priority_id' => 'required|exists:priorities,id',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Add additional data manually
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['status'] = 'open';
    
        Ticket::create($validatedData);
        
        return redirect()->route('ticket.create');
    }

    public function list()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        return view('ticket.list', ['tickets' => $tickets]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tickets = Ticket::findorFail($id);
        $tickets->delete();

        return redirect()->route('ticket.list');
    }
}
