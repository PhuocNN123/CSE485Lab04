@extends('readers.App')

@section('content')
    <div class="container">
        <h1>Chi tiết reader</h1>
        <p><strong>Họ Tên:</strong> {{ $reader->name }}</p>
        <p><strong>Ngày sinh:</strong> {{ $reader->birthday}}</p>
        <p><strong>Địa Chỉ:</strong> {{ $reader->address}}</p>
        <p><strong>Phone:</strong> {{ $reader->phone}}</p>
        
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
