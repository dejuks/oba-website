@extends('layouts.app')

@section('title', $vacancy->title)

@section('content')
<article class="panel">
    <h1>{{ $vacancy->title }}</h1>
    <p class="muted">{{ $vacancy->department }} • {{ $vacancy->location }} • {{ ucfirst($vacancy->type) }}</p>
    <p><strong>Application deadline:</strong> {{ optional($vacancy->expire_at)->format('M d, Y') ?? 'Not specified' }}</p>

    <h2>Description</h2>
    <div>{!! $vacancy->description_html !!}</div>

    @if($vacancy->requirements)
        <h2>Requirements</h2>
        <p>{{ $vacancy->requirements }}</p>
    @endif

    @if($vacancy->application_url)
        <p><a class="btn" href="{{ $vacancy->application_url }}" target="_blank" rel="noopener">Apply / Download</a></p>
    @endif
</article>
@endsection
