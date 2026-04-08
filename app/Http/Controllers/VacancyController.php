<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index(Request $request): View
    {
        $vacancies = Vacancy::query()
            ->published()
            ->when($request->string('q')->isNotEmpty(), function ($query) use ($request): void {
                $term = (string) $request->string('q');
                $query->where(function ($inner) use ($term): void {
                    $inner->where('title', 'like', "%{$term}%")
                        ->orWhere('department', 'like', "%{$term}%")
                        ->orWhere('location', 'like', "%{$term}%");
                });
            })
            ->when($request->filled('department'), fn ($query) => $query->where('department', $request->string('department')))
            ->when($request->filled('type'), fn ($query) => $query->where('type', $request->string('type')))
            ->latest('publish_at')
            ->paginate(10)
            ->withQueryString();

        return view('vacancies.index', compact('vacancies'));
    }

    public function show(Vacancy $vacancy): View
    {
        abort_unless($vacancy->status === 'published', 404);

        return view('vacancies.show', compact('vacancy'));
    }
}
