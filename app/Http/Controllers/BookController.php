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
            'year' => 'required|integer|min:1900|max:'.date('Y'),
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
        $book = Book::findOrFail($id);
        return view('viewbooks.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id); // Tìm sách theo ID hoặc trả lỗi 404
        return view('viewbooks.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'quantity' => 'required|integer|min:1',
        ]);
    
        $book = Book::findOrFail($id); // Tìm sách theo ID hoặc trả lỗi 404
        $book->update($validated); // Cập nhật thông tin
        return redirect()->route('books.index')->with('success', 'Sách đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    $book = Book::find($id);  // Sử dụng find() thay vì findOrFail()
    
    if (!$book) {
        return redirect()->route('books.index')->with('error', 'Sách không tồn tại!');
    }
    
    $book->delete();  // Xóa sách
   // Tìm sách
   $book = Book::find($id);

   // Xóa các bản ghi trong bảng 'borrows' có 'book_id' trùng với sách cần xóa
   DB::table('borrows')->where('book_id', $id)->delete();

   // Xóa sách
   $book->delete();

   // Chuyển hướng lại với thông báo thành công
   return redirect()->route('books.index')->with('success', 'Sách đã được xóa thành công!');
    }
}
