<?php

namespace App\Services\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getMainCategories(): Collection|array
    {
        return Category::with('children')->where('parent_id', 0)->get();
    }

    public function destroy(Category $category)
    {
        if ($category->children->count() == 0) {
            session()->flash('warning', "Категория удалена");
            $category->delete();
        } else {
            session()->flash('warning', "Невозможно удалить");
        }
    }
}
