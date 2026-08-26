@extends('_layouts.main')

@section('body')
    @php($complexity = $page->getComplexity())

    <nav class="mb-8 flex items-center gap-2 text-sm text-slate-500" aria-label="Breadcrumb">
        <a href="/" class="font-semibold text-slate-500 no-underline hover:text-brand-600 dark:text-slate-400">Problems</a>
        <svg class="size-3.5 text-slate-300 dark:text-slate-700" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="m6 3 5 5-5 5"/></svg>
        <span class="truncate">{{ $page->title }}</span>
    </nav>

    <div class="grid gap-12 xl:grid-cols-[minmax(0,1fr)_15rem]">
        <article class="min-w-0">
            <header class="mb-10 border-b border-slate-200 pb-8 dark:border-slate-800">
                <div class="mb-4 flex flex-wrap items-center gap-2">
                    @foreach ($page->categories ?? [] as $category)
                        <a
                            href="/categories/{{ $category }}"
                            class="rounded-md bg-brand-50 px-2.5 py-1 text-xs font-bold text-brand-700 no-underline hover:bg-brand-100 dark:bg-blue-950 dark:text-blue-300"
                        >{{ str_replace('-', ' ', $category) }}</a>
                    @endforeach
                    <span class="font-mono text-xs text-slate-400">{{ $page->getDate()->format('F j, Y') }}</span>
                </div>

                <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-slate-950 sm:text-5xl dark:text-white">{{ $page->title }}</h1>

                <div class="mt-7 flex flex-wrap items-center gap-3">
                    @if ($complexity['time'])
                        <span class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-500 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-400">
                            <span>Time</span>
                            <code class="font-mono text-slate-900 dark:text-slate-100">{{ $complexity['time'] }}</code>
                        </span>
                    @endif
                    @if ($complexity['space'])
                        <span class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-500 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-400">
                            <span>Space</span>
                            <code class="font-mono text-slate-900 dark:text-slate-100">{{ $complexity['space'] }}</code>
                        </span>
                    @endif
                    @if ($page->problemUrl)
                        <a
                            target="_blank"
                            rel="noopener noreferrer"
                            href="{{ $page->problemUrl }}"
                            class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-3.5 py-2 text-xs font-bold text-white no-underline hover:bg-brand-700 dark:text-white"
                        >
                            Open original problem
                            <svg class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M15 3h6v6M10 14 21 3M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </header>

            <div class="prose-content" data-post-content>
                @yield('content')
            </div>

            <nav class="mt-14 grid gap-4 border-t border-slate-200 pt-8 sm:grid-cols-2 dark:border-slate-800" aria-label="Adjacent problems">
                <div>
                    @if ($next = $page->getNext())
                        <span class="block text-xs font-bold uppercase tracking-wider text-slate-400">Previous problem</span>
                        <a href="{{ $next->getUrl() }}" class="mt-1 block font-bold text-slate-900 no-underline hover:text-brand-600 dark:text-white dark:hover:text-blue-400">&larr; {{ $next->title }}</a>
                    @endif
                </div>
                <div class="text-right">
                    @if ($previous = $page->getPrevious())
                        <span class="block text-xs font-bold uppercase tracking-wider text-slate-400">Next problem</span>
                        <a href="{{ $previous->getUrl() }}" class="mt-1 block font-bold text-slate-900 no-underline hover:text-brand-600 dark:text-white dark:hover:text-blue-400">{{ $previous->title }} &rarr;</a>
                    @endif
                </div>
            </nav>
        </article>

        <aside data-toc-container class="hidden xl:block">
            <div class="sticky top-24">
                <p class="mb-3 text-xs font-extrabold uppercase tracking-widest text-slate-400">On this page</p>
                <nav data-toc class="border-l border-slate-200 dark:border-slate-800" aria-label="Table of contents"></nav>
            </div>
        </aside>
    </div>
@endsection
