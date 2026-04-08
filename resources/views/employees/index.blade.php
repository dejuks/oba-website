@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<h1>Employee Directory</h1>
<div class="grid grid-3">
    <div class="panel"><strong>Total:</strong> {{ $summary['total'] }}</div>
    <div class="panel"><strong>Male:</strong> {{ $summary['male'] }}</div>
    <div class="panel"><strong>Female:</strong> {{ $summary['female'] }}</div>
</div>

<div class="panel">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Position</th>
        </tr>
        </thead>
        <tbody>
        @forelse($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->full_name }}</td>
                <td>{{ ucfirst($employee->gender) }}</td>
                <td>{{ $employee->department }}</td>
                <td>{{ $employee->position }}</td>
            </tr>
        @empty
            <tr><td colspan="5">No employees found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

{{ $employees->links() }}
@endsection
