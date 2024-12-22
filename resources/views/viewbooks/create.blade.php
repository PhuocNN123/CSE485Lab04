@extends('viewbooks.app') <!-- Kế thừa layout chính -->

@section('content')
    <div class="container">
        <h1>Thêm mới sách</h1>
        
        <!-- Form để thêm sách -->
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên sách</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            
            <div class="mb-3">
                <label for="author" class="form-label">Tác giả</label>
                <input type="text" name="author" class="form-control" id="author" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Thể loại</label>
                <input type="text" name="category" class="form-control" id="category" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Năm xuất bản</label>
                <input type="number" name="year" class="form-control" id="year" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" class="form-control" id="quantity" required>
            </div>

            <button type="submit" class="btn btn-primary">Thêm sách</button>
        </form>
    </div>
@endsection
