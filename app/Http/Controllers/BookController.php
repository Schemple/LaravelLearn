<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;

class BookController extends Controller
{

    public function add(StoreBookRequest $request)
    {
        $data = $request->validatedWithImage();
        Book::create($data);
        return response()->json($data);
//        return redirect()->route('book.add');
    }

    public function all()
    {
        return response()->json(Book::all());
    }
}
