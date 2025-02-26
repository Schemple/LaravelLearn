@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Danh sách chi tiêu</h2>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Thêm Chi Tiêu</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Ngày chi</th>
                <th>Tên khoản chi</th>
                <th>Lượng chi</th>
                <th>Ghi chú</th>
                <th>Nguồn chi</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->name }}</td>
                    <td>{{ number_format($expense->amount, 2) }} VND</td>
                    <td>{{ $expense->note }}</td>
                    <td>{{ $expense->source }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
