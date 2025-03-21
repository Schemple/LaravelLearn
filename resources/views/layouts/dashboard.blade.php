<!DOCTYPE html>
<html lang="vi" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
{{--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">--}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 h-full">

<div class="flex">
    <!-- Sidebar -->
    <div class="w-50 bg-gray-800 text-white">
        <div class="p-4">
            <h1 class="text-2xl font-bold">Quản Lý Sách</h1>
        </div>
        <nav class="mt-5">
            <ul>
                <li class="px-4 py-2 hover:bg-gray-700 {{ request('home') ? 'bg-gray-700' : ''}}"><a href="{{ route('home') }}">Trang Chủ</a></li>
                <li class="px-4 py-2 hover:bg-gray-700 {{ request('book') ? 'bg-gray-700' : ''}}"><a href="{{ route('book') }}">Sách</a></li>
                <li class="px-4 py-2 hover:bg-gray-700 "><a href="{{ route('home') }}">Khách Hàng</a></li>
                <li class="px-4 py-2 hover:bg-gray-700 "><a href="{{ route('home') }}">Doanh Thu</a></li>
                <li class="px-4 py-2 hover:bg-gray-700 "><a href="{{ route('home') }}">Cài Đặt</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>
</div>

</body>
</html>
