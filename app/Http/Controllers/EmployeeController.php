<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::query()->latest('id')->paginate(15);

        $summary = [
            'total' => Employee::count(),
            'male' => Employee::where('gender', 'male')->count(),
            'female' => Employee::where('gender', 'female')->count(),
        ];

        return view('employees.index', compact('employees', 'summary'));
    }
}
