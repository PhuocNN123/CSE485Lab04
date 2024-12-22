@extends('viewbooks.app')
@section('content')
<div class="container">
    <h1>Danh sách Task</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Name</th>
                <th>Author</th>
                <th>Category</th>
                <th>year</th>
                <th>Quantity</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @php
             $i=($books->currentPage() - 1) * $books->perPage() + 1; 
            @endphp
            @foreach ($books as $book)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->quantity }}</td>

                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">Xem</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $books->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection