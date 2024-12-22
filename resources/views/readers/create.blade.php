@extends('readers.App')

@section('content')
    <div class="container">
        <h1>Thêm mới reader</h1>
        <form action="{{ route('readers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Họ Tên:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày Sinh:</label>
                <input type="text" class="form-control" id="birthday" name="birthday" placeholder = "dd/mm/yyyy" required>
            </div> 
            <div class="form-group">
                <label for="address">Địa Chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
             <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection