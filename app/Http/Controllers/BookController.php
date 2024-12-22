<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(5); 
        return view('viewbooks.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('viewbooks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
        ]);
        
        Book::create($request->all()); 

        // Điều hướng sau khi lưu
        return redirect()->route('books.index')->with('success', 'Sách đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Thêm logic hiển thị sách theo ID
    }
}
