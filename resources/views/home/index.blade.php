@extends('layouts.app')

@section('title', 'OBA - Home')

@section('content')
<section class="hero">
    <h1>Welcome to the Oromia Bureau of Agriculture Portal</h1>
    <p>
        A unified platform for jobs, public bill announcements, agriculture advisories,
        training notices, and farmer services.
    </p>
</section>

<section class="grid grid-3">
    <article class="panel">
        <h2>Latest Vacancies</h2>
        <ul>
            @forelse($latestVacancies as $vacancy)
                <li><a href="{{ route('vacancies.show', $vacancy->slug) }}">{{ $vacancy->title }}</a></li>
            @empty
                <li>No vacancies available.</li>
            @endforelse
        </ul>
    </article>

    <article class="panel">
        <h2>Latest Bill Announcements</h2>
        <ul>
            @forelse($latestBills as $bill)
                <li><a href="{{ route('bills.show', $bill->slug) }}">{{ $bill->title }}</a></li>
            @empty
                <li>No bill announcements available.</li>
            @endforelse
        </ul>
    </article>

    <article class="panel">
        <h2>Latest News & Advisories</h2>
        <ul>
            @forelse($latestNews as $article)
                <li><a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a></li>
            @empty
                <li>No news available.</li>
            @endforelse
        </ul>
    </article>
</section>
@endsection
