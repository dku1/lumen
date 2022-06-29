<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\Admin\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::paginate(8);
        $totalCount = Post::all()->count();
        return view('admin.post.index', compact('posts', 'totalCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(CategoryService $service): Application|Factory|View
    {
        $categories = $service->getMainCategories();
        $delimiter = '';
        return view('admin.post.form', compact('categories', 'delimiter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['preview_image'] = $request->file('preview_image')->store('/images/posts/preview_images', 'public');
        $data['main_image'] = $request->file('main_image')->store('/images/posts/main_images', 'public');
        Post::create($data);
        session()->flash('success', 'Пост сохранён');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): Application|Factory|View
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post, CategoryService $service): View|Factory|Application
    {
        $categories = $service->getMainCategories();
        $delimiter = '';
        return view('admin.post.form', compact('post','categories', 'delimiter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('preview_image')){
            Storage::disk('public')->delete($post->preview_image);
            $data['preview_image'] = $request->file('preview_image')->store('/images/posts/preview_images', 'public');
        }
        if ($request->hasFile('main_image')){
            Storage::disk('public')->delete($post->main_image);
            $data['main_image'] = $request->file('main_image')->store('/images/posts/main_images', 'public');
        }
        $post->update($data);
        session()->flash('success', 'Пост изменён');
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        session()->flash('warning', 'Пост удалён');
        return redirect()->route('admin.posts.index');
    }
}
