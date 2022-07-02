<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\PersonalService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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
}
