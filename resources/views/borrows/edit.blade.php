@extends('borrows.App')

@section('content')
    <div class="container mt-5">
        <h1>Cập nhật trạng thái mượn sách</h1>
        
        <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Đang mượn</option>
                    <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Đã trả</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="return_date" class="form-label">Ngày trả</label>
                <input type="date" name="return_date" class="form-control" id="return_date" value="{{ $borrow->return_date ?? '' }}">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
