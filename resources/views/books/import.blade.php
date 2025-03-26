@extends('layouts.dashboard')
@section('title', 'Nhập dữ liệu sách từ excel')

@section('content')
    <div class="h-screen">
        <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
            <h2 class="text-xl font-semibold text-gray-700 text-center">Nhập dữ liệu sách từ Excel</h2>

            @if(session('success'))
                <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-4 p-3 bg-red-100 text-red-700 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">Chọn file Excel</label>
                    <input type="file" id="file" name="file" accept=".xls,.xlsx" class="mt-2 p-2 w-full border rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit" class="w-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Tải lên
                </button>
            </form>
        </div>
    </div>
@endsection
