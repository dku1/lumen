<?php

namespace App\Services\Admin;

use App\Models\Category;

class CategoryService
{
    public function destroy(Category $category)
    {
        if ($category->children->count() == 0 and $category->posts->count() == 0) {
            session()->flash('warning', "Категория удалена");
            $category->delete();
        } else {
            session()->flash('warning', "Невозможно удалить");
        }
    }
}
