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
        $borrows = Borrow::paginate(5); 
        return view('borrows.index', compact('borrows'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $borrow = Borrow::find($id);
        return view('borrows.edit', compact('borrow'));
    }

    public function update(Request $request, string $id)
    {
        // Tìm mượn sách theo ID
        $borrow = Borrow::find($id);
    
        if (!$borrow) {
            return redirect()->route('borrows.index')->with('error', 'Mượn sách không tồn tại.');
        }
    
        $borrow->status = $request->status; //(0: Đang mượn, 1: Đã trả)
        
        // Nếu có ngày trả, cập nhật ngày trả, nếu không sẽ để giá trị mặc định
        if ($request->status == 1 && $request->return_date) {
            $borrow->return_date = $request->return_date; 
        }
    
        $borrow->save();
    
        return redirect()->route('borrows.index')->with('success', 'Trạng thái mượn sách đã được cập nhật.');
    }
    

    public function destroy(string $id)
    {
        //
    }
}
