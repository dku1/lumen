<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        $rules = ['title' => 'required|string'];
        if ($this->path() == 'admin/tags') $rules['title'] .= '|unique:tags,title';
        return $rules;
    }

    public function messages()
    {
        return [
          'title.required' => 'Введите название',
          'title.unique' => 'Название занято',
        ];
    }
}
