<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
        $book_id = $this->route('id');

        return [
            'book_code' => ['required', 'string', Rule::unique('books', 'book_code')->ignore($book_id)],
            'title' => ['required', 'string', 'max:100', Rule::unique('books', 'title')->ignore($book_id)],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string', 'max:100'],
        ];
    }
}
