@extends('layouts.app')

@section('title', $article->title)

@section('content')
<article class="panel">
    <h1>{{ $article->title }}</h1>
    <p class="muted">Published: {{ optional($article->publish_at)->format('M d, Y') ?? 'N/A' }}</p>
    <p>{{ $article->summary }}</p>
    <div>{!! $article->content_html !!}</div>
</article>
@endsection
