@extends('_layouts.main')

@section('body')
    <article class="mx-auto max-w-3xl">
        <header class="mb-10 border-b border-slate-200 pb-8 dark:border-slate-800">
            <p class="mb-2 font-mono text-xs font-semibold uppercase tracking-[0.2em] text-brand-600 dark:text-blue-400">Reference</p>
            <h1 class="text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl dark:text-white">{{ $page->title }}</h1>
            @if ($page->tags)
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach ($page->tags as $tag)
                        <span class="rounded-md bg-brand-50 px-2.5 py-1 text-xs font-bold text-brand-700 dark:bg-blue-950 dark:text-blue-300">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif
        </header>

        <div class="prose-content">
            @yield('content')
        </div>
    </article>
@endsection