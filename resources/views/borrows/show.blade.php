@extends('borrows.App')

@section('content')
<div class="container mt-5">
    <h1>Lịch sử mượn sách</h1>

    @if($borrows->isEmpty())
        <p>Độc giả này chưa mượn sách nào.</p>
    @else
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Tên sách</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->book->name }}</td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date ?? 'Chưa trả' }}</td>
                        <td>
                            @if($borrow->status == 0)
                                <span class="badge bg-warning">Đang mượn</span>
                            @else
                                <span class="badge bg-success">Đã trả</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('borrows.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
