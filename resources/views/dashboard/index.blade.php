@extends('layouts.dashboard')
@section('title', 'Quản lí cửa hàng cho thuê sách')

@section('content')
    <div class="h-screen">

        <h2 class="text-2xl font-bold mb-4">Thống Kê Tổng Quan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Đơn thuê chưa hoàn trả</h3>
                <p class="text-2xl">{{ $activeRentalNum }}</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Sách Đang Cho Thuê</h3>
                <p class="text-2xl">{{ $rentedBooksNum }}</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Doanh Thu Hàng Tháng</h3>
                <p class="text-2xl">50 VNĐ</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Khách Hàng Đăng Ký</h3>
                <p class="text-2xl">0</p>
            </div>
        </div>

        <h2 class="text-2xl font-bold mt-8 mb-4">Danh Sách Sách</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="border px-4 py-2">Tên Sách</th>
                <th class="border px-4 py-2">Tác Giả</th>
                <th class="border px-4 py-2">Số lượng</th>
                <th class="border px-4 py-2"></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($books) && count($books) > 0)
                @foreach($books as $book)
                <tr>
                    <td class="border px-4 py-2">{{ $book['tittle'] }}</td>
                    <td class="border px-4 py-2">{{ $book['author'] }}</td>
                    <td class="border px-4 py-2">{{ $book['stock'] }}</td>
                    <td class="border px-4 py-2">-</td>
                </tr>
                @endforeach
            @endif
            <!-- Thêm nhiều dòng hơn nếu cần -->
            </tbody>
        </table>
    </div>

@endsection
