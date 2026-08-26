<!DOCTYPE html>
<html lang="en" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/assets/images/favicon.ico">
        <script>
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', savedTheme === 'dark' || (!savedTheme && prefersDark));
            document.documentElement.classList.toggle('light', savedTheme === 'light');
        </script>

        @if ($page->production && $page->gaTrackingId)
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ $page->gaTrackingId }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '{{ $page->gaTrackingId }}');
            </script>
        @endif

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Nunito+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ $page->viteAsset('source/_assets/js/main.js', 'css') }}">
    </head>

    <body class="min-h-full">
        <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur dark:border-slate-800 dark:bg-slate-950/90" role="banner">
            <div class="mx-auto flex h-16 max-w-screen-2xl items-center gap-3 px-4 sm:px-6">
                <button
                    type="button"
                    data-sidebar-toggle
                    class="inline-flex size-10 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100 lg:hidden dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-900"
                    aria-label="Open category navigation"
                    aria-expanded="false"
                >
                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <a href="/" title="{{ $page->siteName }} home" class="flex min-w-0 items-center gap-3 no-underline">
                    <img class="size-9 shrink-0" src="/assets/images/logo.svg" alt="{{ $page->siteName }} logo" />
                    <span class="hidden truncate text-base font-extrabold tracking-tight text-slate-950 sm:block dark:text-white">{{ $page->siteName }}</span>
                </a>

                <div class="ml-auto flex items-center gap-2">
                    <button
                        type="button"
                        data-search-open
                        class="flex h-10 items-center gap-2 whitespace-nowrap rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm text-slate-500 hover:border-slate-300 hover:bg-white sm:w-72 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-400 dark:hover:border-slate-700 dark:hover:bg-slate-800"
                    >
                        <svg class="size-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>
                        </svg>
                        <span class="truncate">Search problems</span>
                        <kbd class="ml-auto hidden shrink-0 rounded border border-slate-200 bg-white px-1.5 py-0.5 font-mono text-[11px] leading-none dark:border-slate-700 dark:bg-slate-800 sm:inline-block">/</kbd>
                    </button>

                    <button
                        type="button"
                        data-theme-toggle
                        class="inline-flex size-10 items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100 dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-900"
                        aria-label="Toggle dark mode"
                    >
                        <svg class="size-5 dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M12 3a9 9 0 1 0 9 9 7 7 0 0 1-9-9Z"/>
                        </svg>
                        <svg class="hidden size-5 dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.42 1.42M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.42-1.42M17.66 6.34l1.41-1.41"/>
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <div class="mx-auto flex max-w-screen-2xl">
            @include('_components.sidebar')

            <main role="main" class="min-w-0 flex-1 px-5 py-10 sm:px-8 lg:px-10 lg:py-12">
                <div class="mx-auto max-w-6xl">
                    @yield('body')
                </div>
            </main>
        </div>

        @include('_components.search-dialog')

        <script type="module" src="{{ $page->viteAsset('source/_assets/js/main.js') }}"></script>
        @stack('scripts')
    </body>
</html>
