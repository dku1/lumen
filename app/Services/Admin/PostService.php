<?php

namespace App\Services\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store(array $data)
    {
        $data['preview_image'] = Storage::put('/images/posts/preview_images', $data['preview_image']);
        $data['main_image'] = Storage::put('/images/posts/main_images', $data['main_image']);

        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }

        $post = Post::create($data);

        if (isset($tagIds)) {
            $post->tags()->attach($tagIds);
        }

    }

    public function update(array $data, Post $post)
    {
        if (isset($data['preview_image'])) {
            Storage::delete($post->preview_image);
            $data['preview_image'] = Storage::put('/images/posts/preview_images', $data['preview_image']);
        }
        if (isset($data['main_image'])) {
            Storage::delete($post->main_image);
            $data['main_image'] = Storage::put('/images/posts/main_images', $data['main_image']);
        }

        if (isset($data['tag_ids'])) {
            $post->tags()->sync($data['tag_ids']);
            unset($data['tag_ids']);
        }else{
            $post->tags()->detach();
        }

        $post->update($data);
    }
}
