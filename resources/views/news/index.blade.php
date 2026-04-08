@extends('layouts.app')

@section('title', 'News & Advisories')

@section('content')
<h1>News & Advisories</h1>
<form method="GET" class="filters">
    <input type="text" name="q" placeholder="Search news" value="{{ request('q') }}">
    <button type="submit">Search</button>
</form>

<div class="stack">
    @forelse($articles as $article)
        <article class="panel">
            <h2><a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a></h2>
            <p class="muted">Published: {{ optional($article->publish_at)->format('M d, Y') ?? 'N/A' }}</p>
            <p>{{ $article->summary }}</p>
        </article>
    @empty
        <p>No news found.</p>
    @endforelse
</div>

{{ $articles->links() }}
@endsection
