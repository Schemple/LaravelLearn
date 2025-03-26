@extends('layouts.dashboard')
@section('title', 'Quản lí sách')
@section('content')
    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-semibold text-gray-700 text-center">Danh sách sách</h2>

        <!-- Hiển thị tổng số sách -->
        <div class="mt-4 flex justify-between items-center">
            <p class="text-lg font-semibold">Tổng số sách: <span class="text-indigo-600">{{ $totalBooks }}</span></p>
            <div>
                <a href="{{ route('book.add') }}" class="mr-5 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                    + Thêm sách
                </a>
                <a href="{{ route('book.import') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    📥 Import sách
                </a>
            </div>
        </div>

        <!-- Bảng hiển thị danh sách sách -->
        <div class="mt-6">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Tựa đề</th>
                    <th class="border px-4 py-2">Tác giả</th>
                    <th class="border px-4 py-2">Năm XB</th>
                    <th class="border px-4 py-2">Số lượng</th>
                    <th class="border px-4 py-2">Ảnh bìa</th>
                    <th class="border px-4 py-2">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($books as $book)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $book->title }}</td>
                        <td class="border px-4 py-2">{{ $book->author }}</td>
                        <td class="border px-4 py-2">{{ $book->published_year }}</td>
                        <td class="border px-4 py-2">{{ $book->stock }}</td>
                        <td class="border px-4 py-2">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" class="w-12 h-12 object-cover rounded">
                            @else
                                <span class="text-gray-400">Không có ảnh</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <div class="mb-4">
                                <a href="{{ route('book.edit', $book->id) }}" class="h-full bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Sửa
                                </a>
                            </div>
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
