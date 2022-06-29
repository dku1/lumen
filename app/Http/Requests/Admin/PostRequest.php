<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'content' => 'required',
            'preview_image' => 'image:jpg, jpeg, png',
            'main_image' => 'image:jpg, jpeg, png',
        ];

        if ($this->path() == 'admin/posts') {
            $rules['title'] .= '|unique:posts,title';
            $rules['preview_image'] .= '|required';
            $rules['main_image'] .= '|required';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Добавьте название',
            'title.unique' => 'Это название занято',
            'preview_image.required' => 'Добавьте изображение',
            'main_image.required' => 'Добавьте изображение',
            'preview_image.image' => 'Изображение не соответствует формату',
            'main_image.image' => 'Изображение не соответствует формату',
            'category_id.required' => 'Выберите категорию',
            'category_id.exists' => 'Такой категори не существует',
            'content.required' => 'Добавьте контент',
        ];
    }
}
