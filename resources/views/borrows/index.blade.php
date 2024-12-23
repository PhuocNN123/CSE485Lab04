@extends('borrows.App')

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách Mượn sách</h1>
        <a href="{{ route('borrows.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Độc giả</th>
                    <th>Sách</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->reader->name }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>
                            @if($borrow->status == 0)
                                <span class="badge bg-warning">Đang mượn</span>
                            @else
                                <span class="badge bg-success">Đã trả</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info">Xem</a>
                                <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $borrows->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
