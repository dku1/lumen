<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tags = Tag::paginate(8);
        $tagsCount = Tag::all()->count();
        return view('admin.tag.index', compact('tags', 'tagsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.tag.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function store(TagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());
        session()->flash('success', 'Тэг создан');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function edit(Tag $tag): View|Factory|Application
    {
        return view('admin.tag.form', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());
        session()->flash('success', 'Тэг изменён');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        session()->flash('warning', 'Тэг удалён');
        return redirect()->route('admin.tags.index');
    }
}
