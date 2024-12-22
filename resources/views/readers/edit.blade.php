@extends('readers.App')
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
@section('content')
    <div class="container">
        <h1>Sửa Reader</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Họ Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name }}" required>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày Sinh:</label>
                <input type="text" class="form-control" id="birthday" name="birthday" value="{{ \Carbon\Carbon::parse($reader->birthday)->format('d/m/Y') }}" placeholder="dd/mm/yyyy" required>
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $reader->address }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $reader->phone }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
