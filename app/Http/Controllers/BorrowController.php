<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        return view('borrows.index');
    }

    public function create()
    {
        return view('borrows.create');
    }

    public function store(Request $request)
    {
        // Lưu borrow mới
    }

    public function show($id)
    {
        return view('borrows.show');
    }

    public function edit($id)
    {
        return view('borrows.edit');
    }

    public function update(Request $request, $id)
    {
        // Cập nhật borrow
    }

    public function destroy($id)
    {
        // Xóa borrow
    }
}
