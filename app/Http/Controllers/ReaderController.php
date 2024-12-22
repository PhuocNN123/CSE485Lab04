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
        $readers = Reader::paginate(5);
        return view('readers.index',compact('readers'));
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
            'name' => 'required',
            'birthday' => 'required|date_format:d/m/Y',
            'address' => 'required',
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reader = Reader::find($id);
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reader = Reader::find($id);
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'birthday' => 'required|date_format:d/m/Y',
            'address' => 'required',
            'phone' => 'required|string|max:20',
        ]);
        $reader = Reader::find($id);
        $birthday = Carbon::createFromFormat('d/m/Y', $request->input('birthday'))->format('Y-m-d');
        $reader->update([ 'name' => $validatedData['name'],
                          'birthday' => Carbon::createFromFormat('d/m/Y', $validatedData['birthday'])->format('Y-m-d'),
                          'address' => $validatedData['address'],
                          'phone' => $validatedData['phone'],
        ]);
        return redirect()->route('readers.index')->with('success', 'Reader updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reader = Reader::find($id);
        $reader->delete();

        return redirect()->route('readers.index')->with('success', 'Reader deleted successfully.');
    }
}
