<?php

namespace App\Http\Controllers;

use App\Events\NewBook;
use App\Http\Requests\StoreBookRequest;
use App\Jobs\AddBook;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function viewOne($id)
    {
        $book = Book::find($id);
        if ($book){
            return view('dashboard.book.show', ['book' => $book]);
        }
        return redirect()->route('404');
    }

    public function viewAdd()
    {
        return view('dashboard.book.add');
    }

    public function index()
    {
        return Book::all();
//        return response()->json(Book::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validatedWithImage();
        dispatch(new AddBook($data));
        if ($request->is('api/*'))
        {
            return response()->json($data);
        }
        event(new NewBook("hahaha"));
        return redirect()->back();
//        return redirect()->route('home');
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
    public function update(Request $request, string $id)
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
