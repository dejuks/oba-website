@extends('layouts.app')

@section('title', 'Vacancies')

@section('content')
<h1>Vacancies</h1>
<form method="GET" class="filters">
    <input type="text" name="q" placeholder="Search vacancies" value="{{ request('q') }}">
    <input type="text" name="department" placeholder="Department" value="{{ request('department') }}">
    <select name="type">
        <option value="">Any contract type</option>
        <option value="full-time" @selected(request('type') === 'full-time')>Full-time</option>
        <option value="contract" @selected(request('type') === 'contract')>Contract</option>
        <option value="internship" @selected(request('type') === 'internship')>Internship</option>
    </select>
    <button type="submit">Filter</button>
</form>

<div class="stack">
    @forelse($vacancies as $vacancy)
        <article class="panel">
            <h2><a href="{{ route('vacancies.show', $vacancy->slug) }}">{{ $vacancy->title }}</a></h2>
            <p class="muted">{{ $vacancy->department }} • {{ $vacancy->location }} • {{ ucfirst($vacancy->type) }}</p>
            <p>Deadline: {{ optional($vacancy->expire_at)->format('M d, Y') ?? 'Not specified' }}</p>
        </article>
    @empty
        <p>No vacancies found.</p>
    @endforelse
</div>

{{ $vacancies->links() }}
@endsection
