<?php

namespace App\Repositories\Eloquent;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAll(): Collection
    {
        return $this->book::all();
    }

    public function getById(int $id): ?Book
    {
        return Book::find($id);
    }

    public function create(array $data): Book
    {
        return Book::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Book::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Book::destroy($id);
    }

    public function count(): int
    {
        return Book::count();
    }

    public function totalStock(): int
    {
        return Book::sum('stock');
    }
}
