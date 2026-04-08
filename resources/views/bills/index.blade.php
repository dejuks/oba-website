@extends('layouts.app')

@section('title', 'Bill Announcements')

@section('content')
<h1>Bill Announcements</h1>
<form method="GET" class="filters">
    <input type="text" name="q" placeholder="Search by title, number, summary" value="{{ request('q') }}">
    <button type="submit">Search</button>
</form>

<div class="stack">
    @forelse($bills as $bill)
        <article class="panel">
            <h2><a href="{{ route('bills.show', $bill->slug) }}">{{ $bill->title }}</a></h2>
            <p class="muted">Bill No: {{ $bill->bill_number }}</p>
            <p>{{ $bill->summary }}</p>
        </article>
    @empty
        <p>No bill announcements found.</p>
    @endforelse
</div>

{{ $bills->links() }}
@endsection
