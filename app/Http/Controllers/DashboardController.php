<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
class DashboardController extends Controller
{
    public function index()
    {
        $book = new BookController();
        $books = $book->index();
        return view('dashboard.index', ['books' => $books]);
    }
}
