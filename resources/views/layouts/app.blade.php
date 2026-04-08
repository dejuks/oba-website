<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Oromia Bureau of Agriculture')</title>
    <meta name="description" content="Official Oromia Bureau of Agriculture portal for vacancies, bill announcements, and agricultural advisories.">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
<header class="topbar">
    <div class="container topbar-inner">
        <div>
            <strong>Oromia Bureau of Agriculture</strong>
            <span class="muted">| ኦሮሚያ ግብርና ቢሮ | Waajjira Qonnaa Oromiyaa</span>
        </div>
        <div class="lang-switch">
            <a href="#">Afaan Oromoo</a>
            <a href="#">አማርኛ</a>
            <a href="#">English</a>
        </div>
    </div>
</header>

<nav class="main-nav">
    <div class="container nav-inner">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('vacancies.index') }}">Vacancies</a>
        <a href="{{ route('bills.index') }}">Bill Announcements</a>
        <a href="{{ route('news.index') }}">News & Advisories</a>
        <a href="{{ route('employees.index') }}">Employees</a>
    </div>
</nav>

<main class="container page-content">
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container">
        <p>© {{ now()->year }} Oromia Bureau of Agriculture. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
