@extends('readers.App')

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách reader</h1>
        <a href="{{ route('readers.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($readers as $reader)
                    <tr>
                        <td>{{ $reader->id }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('readers.show', $reader->id) }}" class="btn btn-info">Xem</a>
                                <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" style="display: inline-block;">
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
            {{ $readers->links('pagination::bootstrap-5') }} 
        </div>
    </div>
@endsection
