<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:1',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function validatedWithImage(): array
    {
        $data = $this->validated();
        if ($this->hasFile('cover')) {
            $file = $this->file('cover');
            $fileName = time() . '_' . $this->input('title') . '_' . $this->input('published_year') . '.' . $file->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getRealPath());

            // Thực hiện các thao tác xử lý ảnh (ví dụ: resize)
//            $image->resize(300, 400);
            $image = $image->scale(width: 1920, height: 1920);

            // Lưu ảnh đã xử lý vào storage
            $filePath = 'public/covers/' . $fileName;
            Storage::put($filePath, (string) $image->encode());

            // Lưu đường dẫn ảnh vào database
            $data['cover'] = 'storage/covers/' . $fileName;
        }

        return $data;
    }

}
