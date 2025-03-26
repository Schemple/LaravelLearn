<?php

namespace App\Http\Controllers;

use App\Events\NewBook;
use App\Http\Requests\StoreBookRequest;
use App\Imports\BookImport;
use App\Jobs\AddBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function viewEdit($id){
        $book = Book::find($id);
        if ($book){
            return view('books.edit',compact('book'));
        }
        return view('404');
    }

    public function importExcel(Request $request)
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

    public function viewImport()
    {
        return view('books.import');
    }

    public static function totalBooks()
    {
        $totalBooks = Book::sum('stock');
        return $totalBooks;
    }

    public function viewOne($id)
    {
        $book = Book::find($id);
        if ($book) {
            return view('books.show', ['book' => $book]);
        }
        return redirect()->route('404');
    }

    public function add()
    {
        return view('books.add');
    }

    public function index()
    {
        $totalBooks = Book::count();
        $books = Book::all()->take(10);
        return view('books.index', [
            'totalBooks' => $totalBooks,
            'books' => $books
        ]);
    }
}
