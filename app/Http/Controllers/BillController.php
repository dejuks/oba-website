<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(Request $request): View
    {
        $bills = Bill::query()
            ->published()
            ->when($request->string('q')->isNotEmpty(), function ($query) use ($request): void {
                $term = (string) $request->string('q');
                $query->where(function ($inner) use ($term): void {
                    $inner->where('title', 'like', "%{$term}%")
                        ->orWhere('bill_number', 'like', "%{$term}%")
                        ->orWhere('summary', 'like', "%{$term}%");
                });
            })
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('bills.index', compact('bills'));
    }

    public function show(Bill $bill): View
    {
        abort_unless($bill->status === 'published', 404);

        return view('bills.show', compact('bill'));
    }
}
