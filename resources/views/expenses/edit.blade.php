@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="mb-4">Chỉnh Sửa Chi Tiêu</h2>

        <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="date" class="form-label">Ngày chi</label>
                <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên khoản chi</label>
                <input type="text" name="name" class="form-control" value="{{ $expense->name }}" required>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Lượng chi</label>
                <input type="number" name="amount" class="form-control" step="0.01" value="{{ $expense->amount }}" required>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Ghi chú</label>
                <textarea name="note" class="form-control">{{ $expense->note }}</textarea>
            </div>

            <div class="mb-3">
                <label for="source" class="form-label">Nguồn chi</label>
                <input type="text" name="source" class="form-control" value="{{ $expense->source }}" required>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
