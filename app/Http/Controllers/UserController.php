<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController
{
    public function index()
    {
        $products = ['Alice', 'Bob', 'Charlie'];
        return view('products', compact('products'));
    }

    public function show($id)
    {
        return "User Detail $id";
    }

    public function create()
    {
        return "Create User";
    }

    public function store(Request $request)
    {
        return "Store User";
    }
}
