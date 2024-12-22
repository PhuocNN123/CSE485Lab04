<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        return view('readers.index');
    }

    public function create()
    {
        return view('readers.create');
    }

    public function store(Request $request)
    {
        // Lưu reader mới
    }

    public function show($id)
    {
        return view('readers.show');
    }

    public function edit($id)
    {
        return view('readers.edit');
    }

    public function update(Request $request, $id)
    {
        // Cập nhật reader
    }

    public function destroy($id)
    {
        // Xóa reader
    }
}
