<?php
namespace App\Services;

use App\Events\BookCreated;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;


class BookService
{
    protected BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks(): Collection
    {
        try {

            return $this->bookRepository->getAll();
        } catch (\Exception $e) {
            Log::error('Lỗi truy vấn sách: ' . $e->getMessage());
            return new Collection([]);
        }
    }

    public function getBookById(int $id)
    {
        try {
            return $this->bookRepository->getById($id);
        } catch (\Exception $e) {
            Log::error('Lỗi truy vấn sách:' . $e->getMessage());
            return false;
        }
    }

    public function createBook(array $data)
    {
        try {
//            dispatch(new AddBook($data));
            $book = $this->bookRepository->create($data);
            event(new BookCreated($book, "Thêm sách thành công"));
            return $book;
        } catch (\Exception $e) {
            Log::error('Lỗi tạo sách: ' . $e->getMessage());
            return false;
        }
    }

    public function updateBook(int $id, array $data)
    {
        try {
            return $this->bookRepository->update($id, $data);
        } catch (\Exception $e) {
            Log::error('Lỗi cập nhật sách: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteBook(int $id)
    {
        try {
            return $this->bookRepository->delete($id);
        } catch (\Exception $e) {
            Log::error('Lỗi xóa sách: ' . $e->getMessage());
            return false;
        }
    }

    public function countBook(): int
    {
        return $this->bookRepository->count();
    }

    public function totalStock(): int
    {
        return $this->bookRepository->totalStock();
    }
}
