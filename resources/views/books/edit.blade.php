@extends('layouts.dashboard')
@section('title', 'Chỉnh sửa thông tin sách')
@section('content')
    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <form method="PUT" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Chỉnh sửa thông tin sách</h2>
                    <p class="mt-1 text-sm/6 text-gray-600"></p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-full">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Tiêu đề</label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <input type="text" name="title" id="title"
                                           class="rounded-md bg-gray-50 block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                           placeholder="Tiêu đề sách" value="{{ $book['title'] }}">
                                </div>
                                @error('title')
                                <p class="mt-1 text-sm text-red-500" id="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-full">
                            <label for="author" class="block text-sm/6 font-medium text-gray-900">Tác giả</label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <input type="text" name="author" id="author"
                                           class="rounded-md bg-gray-50 block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                           placeholder="Tác giả" value="{{ $book['author'] }}">
                                </div>
                                @error('author')
                                <p class="mt-1 text-sm text-red-500" id="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-full">
                            <label for="published_year" class="block text-sm/6 font-medium text-gray-900">Năm xuất bản</label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <input type="text" name="published_year" id="published_year"
                                           class="rounded-md bg-gray-50 block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                           placeholder="Năm xuất bản" value="{{ $book['published_year'] }}">
                                </div>
                                @error('published_year')
                                <p class="mt-1 text-sm text-red-500" id="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-full">
                            <label for="stock" class="block text-sm/6 font-medium text-gray-900">Số lượng</label>
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                    <input type="number" name="stock" id="stock"
                                           class="rounded-md bg-gray-50 block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                           placeholder="0" value="{{ $book['stock'] }}">
                                </div>
                                @error('stock')
                                <p class="mt-1 text-sm text-red-500" id="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Ảnh bìa</label>
                            <div id="drop-zone"
                                 class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="col-span-full text-center">
                                    <img id="preview-image" class="hidden mb-4 rounded-lg w-40 h-40 object-cover"
                                         alt="Preview Image">
                                    <p id="preview-message" class="hidden mt-1 text-sm text-gray-300">Kéo ảnh khác vào đây nếu bạn muốn thay đổi bìa</p>
                                </div>
                                <div id="upload-icon" class="text-center">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                         aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                              d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <div class="mt-4 flex text-sm/6 text-gray-600">
                                        <label for="cover"
                                               class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">
                                            <span>Tải ảnh lên </span>
                                            <input id="cover" name="cover" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">hoặc kéo thả ảnh vào đây</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-600">Ảnh định dạng PNG, JPG, GIF nhiều nhất 10MB</p>
                                </div>

                                @error('cover')
                                <p class="mt-1 text-sm text-red-500" id="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" onclick="window.history.back();" class="text-sm/6 font-semibold text-gray-900">Hủy bỏ</button>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let dropZone = document.getElementById("drop-zone");
            let fileInput = document.getElementById("cover");
            let previewImage = document.getElementById("preview-image");
            let previewMessage = document.getElementById("preview-message");
            let uploadIcon = document.getElementById("upload-icon");

            // Ngăn chặn hành vi mặc định của trình duyệt khi kéo thả
            dropZone.addEventListener("dragover", function (e) {
                e.preventDefault();
                dropZone.classList.add("border-indigo-600"); // Đổi màu viền khi kéo vào
            });

            dropZone.addEventListener("dragleave", function (e) {
                e.preventDefault();
                dropZone.classList.remove("border-indigo-600"); // Trả lại màu viền ban đầu
            });

            dropZone.addEventListener("drop", function (e) {
                e.preventDefault();
                dropZone.classList.remove("border-indigo-600");

                let files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFileUpload(files[0]);
                }
            });

            // Bắt sự kiện khi chọn file
            fileInput.addEventListener("change", function (event) {
                let file = event.target.files[0];
                if (file) {
                    handleFileUpload(file);
                }
            });

            function handleFileUpload(file) {
                if (file.type.startsWith("image/")) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.classList.remove("hidden");
                        previewMessage.classList.remove("hidden");
                        uploadIcon.classList.add("hidden");
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert("Chỉ hỗ trợ file ảnh (PNG, JPG, GIF)!");
                }
            }
        });
    </script>

@endsection
