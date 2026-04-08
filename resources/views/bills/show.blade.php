@extends('layouts.app')

@section('title', $bill->title)

@section('content')
<article class="panel">
    <h1>{{ $bill->title }}</h1>
    <p class="muted">Bill No: {{ $bill->bill_number }} | Effective Date: {{ optional($bill->effective_date)->format('M d, Y') ?? 'N/A' }}</p>
    <p>{{ $bill->summary }}</p>
    <div>{!! $bill->content_html !!}</div>
</article>
@endsection
