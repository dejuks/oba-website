<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\NewsArticle;
use App\Models\Vacancy;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home.index', [
            'latestVacancies' => Vacancy::published()->latest('publish_at')->limit(6)->get(),
            'latestBills' => Bill::published()->latest('created_at')->limit(6)->get(),
            'latestNews' => NewsArticle::published()->latest('publish_at')->limit(6)->get(),
        ]);
    }
}
