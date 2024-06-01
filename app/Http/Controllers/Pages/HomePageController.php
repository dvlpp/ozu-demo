<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Project;

class HomePageController extends Controller
{
    public function __invoke()
    {
        return view('pages.home', [
            'page' => Page::where('key', 'home')->first(),
            'projects' => Project::take(2)->get(),
        ]);
    }
}
