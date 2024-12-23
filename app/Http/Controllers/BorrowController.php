<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Paginate the borrows list with 5 items per page
        $borrows = Borrow::paginate(5);
        
        // Return the index view with the paginated borrows
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create view
        return view('borrows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'reader_id' => 'required|integer',
            'book_id' => 'required|integer',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        // Create a new borrow record
        Borrow::create($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('borrows.index')->with('success', 'Borrow record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($readerId)
    {
        // Retrieve the borrow history for a specific reader with related book information
        $borrows = Borrow::where('reader_id', $readerId)
            ->with('book')
            ->get();

        // Return the show view with the borrows data
        return view('borrows.show', compact('borrows'));
    }

    /**
     * Other methods can be added here (edit, update, destroy, etc.) as needed.
     */
}
