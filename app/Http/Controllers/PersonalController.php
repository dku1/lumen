<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index(): Factory|View|Application
    {
        $user = auth()->user();
        return view('personal.index', compact('user'));
    }
}
