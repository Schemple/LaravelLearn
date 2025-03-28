<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Imports\BookImport;
use App\Services\BookService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $totalBooks = $this->bookService->countBook();
        $books = $this->bookService->getAllBooks()->take(10);
        return view('books.index', [
            'totalBooks' => $totalBooks,
            'books' => $books
        ]);
    }

    public function viewEdit($id)
    {
        $book = $this->bookService->getBookById($id);
        if ($book) {
            return view('books.edit', compact('book'));
        }
        return view('404');
    }

    public function update(StoreBookRequest $request, $id)
    {
        $data = $request->validatedWithImage();
        $update = $this->bookService->updateBook($id, $data);
        if ($update) {
            return redirect()->route('book.index')->with('success', 'Cập nhật thông tin sách thành công!');
        }
        return redirect()->route('book.index')->with('failed', 'Đã xảy ra lỗi, vui lòng thử lại sau.');
    }

    public function viewImport()
    {
        return view('books.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx|max:2048',
        ]);
        try {
            Excel::import(new BookImport, $request->file('file'));
            return back()->with('success', 'Nhập dữ liệu sách thành công!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Lỗi khi nhập file: ' . $e->getMessage()]);
        }
    }

    public function viewOne($id)
    {
        $book = $this->bookService->getBookById($id);
        if ($book) {
            return view('books.show', compact('book'));
        }
        return redirect()->route('404');
    }

    public function viewAdd()
    {
        return view('books.add');
    }

    public function add(StoreBookRequest $request)
    {
        $data = $request->validatedWithImage();
        $create = $this->bookService->createBook($data);
        if ($create) {
            return back()->with('success', 'Nhập dữ liệu sách thành công!');
        }
        return back()->with('error', 'Có lỗi xảy ra! Xin vui lòng thử lại.');
    }

    public function delete($id)
    {
        $delete = $this->bookService->deleteBook($id);
        if ($delete) {
            return redirect()->route('book.index')->with('success', 'Xóa sách thành công!');
        }
        return back()->with('error', 'Có lỗi xảy ra! Xin vui lòng thử lại.');
    }
}
