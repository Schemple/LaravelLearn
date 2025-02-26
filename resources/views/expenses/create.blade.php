@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Thêm Chi Tiêu</h2>

        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Ngày chi</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên khoản chi</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Lượng chi</label>
                <input type="number" name="amount" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Ghi chú</label>
                <textarea name="note" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="source" class="form-label">Nguồn chi</label>
                <input type="text" name="source" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
