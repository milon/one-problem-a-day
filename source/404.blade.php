---
permalink: 404.html
---
@extends('_layouts.main')

@section('body')
    <div class="mx-auto mt-20 max-w-xl text-center">
        <p class="font-mono text-sm font-bold uppercase tracking-[0.25em] text-brand-600 dark:text-blue-400">Error 404</p>
        <h1 class="mt-4 text-5xl font-extrabold tracking-tight text-slate-950 dark:text-white">Problem not found.</h1>
        <p class="mt-5 text-lg text-slate-500">This page may have moved, or perhaps it was an edge case we missed.</p>
        <a href="/" class="mt-8 inline-flex rounded-lg bg-brand-600 px-5 py-2.5 font-bold text-white no-underline hover:bg-brand-700 dark:text-white">Browse all problems</a>
    </div>
@endsection
 