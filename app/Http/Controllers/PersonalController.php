<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\EditRequest;
use App\Models\User;
use App\Services\PersonalService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PersonalController extends Controller
{

    public PersonalService $service;

    public function __construct(PersonalService $service)
    {
        $this->service = $service;
    }

    public function index(): Factory|View|Application
    {
        $user = auth()->user();
        return view('personal.index', compact('user'));
    }

    public function comments(): Factory|View|Application
    {
        $comments = $this->service->getLastComments();
        return view('personal.comments', compact('comments'));
    }

    public function liked(): Factory|View|Application
    {
        $posts = auth()->user()->likes;
        return view('personal.liked', compact('posts'));
    }

    public function edit(): Factory|View|Application
    {
        $user = auth()->user();
        return view('personal.form', compact('user'));
    }

    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user->update([
            'login' => $request->login,
            'email' => $request->email,
        ]);
        session()->flash('success', 'Профиль изменён');
        return redirect()->route('personal.index');
    }
}
