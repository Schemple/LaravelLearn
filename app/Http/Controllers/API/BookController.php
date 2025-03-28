<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Jobs\AddBook;
use App\Models\Book;
use App\Services\BookService;

class BookController extends Controller
{
    private BookService $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = $this->bookService->getAllBooks();
        return response()->json($book, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validatedWithImage();
        dispatch(new AddBook($data));
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        if (!($book)) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, string $id)
    {
        $book = Book::find($id);
        if (!($book)) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
        $book->update($request->validatedWithImage());
        return response()->json(['message' => 'Cập nhật thành công'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
        $book->delete();
        return response()->json(['message' => 'Xóa sách thành công'], 200);
    }
}
