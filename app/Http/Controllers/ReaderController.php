<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Kết hợp chức năng của cả hai nhánh
        $readers = Reader::paginate(5);
        return view('readers.index', compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('readers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date_format:d/m/Y',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Reader::create([
            'name' => $validatedData['name'],
            'birthday' => Carbon::createFromFormat('d/m/Y', $validatedData['birthday'])->format('Y-m-d'),
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
        ]);

        return redirect()->route('readers.index')->with('success', 'Reader created successfully.');
    }
}
