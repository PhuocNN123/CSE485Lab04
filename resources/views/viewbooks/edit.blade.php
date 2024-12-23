<!-- resources/views/books/edit.blade.php -->

@extends('viewbooks.app')  <!-- Kế thừa layout chính -->

@section('content')
    <div class="container">
        <h1>Chỉnh sửa thông tin sách</h1>

        <!-- Hiển thị thông báo nếu có -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form chỉnh sửa sách -->
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')  <!-- Xác định rằng đây là một yêu cầu PUT để cập nhật dữ liệu -->
            
            <div class="mb-3">
                <label for="name" class="form-label">Tên sách</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $book->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Tác giả</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Thể loại</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $book->category) }}" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Năm xuất bản</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $book->year) }}" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $book->quantity) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
