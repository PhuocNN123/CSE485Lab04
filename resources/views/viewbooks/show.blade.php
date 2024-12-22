<!-- resources/views/books/show.blade.php -->

@extends('viewbooks.app')  <!-- Kế thừa layout chính -->

@section('content')
    <div class="container">
        <h1>Thông tin sách</h1>

        <!-- Hiển thị thông tin của quyển sách -->
        <div class="card">
            <div class="card-header">
                <h3>{{ $book->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Tác giả:</strong> {{ $book->author }}</p>
                <p><strong>Thể loại:</strong> {{ $book->category }}</p>
                <p><strong>Năm xuất bản:</strong> {{ $book->year }}</p>
                <p><strong>Số lượng:</strong> {{ $book->quantity }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
