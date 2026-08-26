<div data-sidebar-backdrop class="fixed inset-0 z-30 hidden bg-slate-950/50 lg:hidden"></div>

<aside
    data-sidebar
    class="fixed inset-y-0 left-0 z-40 w-72 -translate-x-full overflow-y-auto border-r border-slate-200 bg-white px-4 pb-8 pt-5 transition-transform lg:sticky lg:top-16 lg:z-20 lg:h-[calc(100vh-4rem)] lg:w-64 lg:translate-x-0 lg:bg-slate-50 dark:border-slate-800 dark:bg-slate-950"
    aria-label="Problem navigation"
>
    <div class="mb-5 flex items-center justify-between px-2 lg:hidden">
        <span class="font-bold text-slate-950 dark:text-white">Browse problems</span>
        <button type="button" data-sidebar-close class="inline-flex size-9 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-900" aria-label="Close navigation">
            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="m6 6 12 12M18 6 6 18"/>
            </svg>
        </button>
    </div>

    <nav>
        <div class="space-y-1">
            <a
                href="/"
                class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-bold no-underline {{ trim($page->getPath(), '/') === '' ? 'bg-brand-100 text-brand-700 dark:bg-blue-950 dark:text-blue-300' : 'text-slate-700 hover:bg-slate-200/70 dark:text-slate-300 dark:hover:bg-slate-900' }}"
            >
                All problems
                <span class="rounded-md bg-white/70 px-1.5 py-0.5 text-xs tabular-nums dark:bg-slate-800">{{ count($posts) }}</span>
            </a>
            <a
                href="/about"
                class="block rounded-lg px-3 py-2 text-sm font-semibold no-underline {{ $page->isActive('/about') ? 'bg-brand-100 text-brand-700 dark:bg-blue-950 dark:text-blue-300' : 'text-slate-700 hover:bg-slate-200/70 dark:text-slate-300 dark:hover:bg-slate-900' }}"
            >About this project</a>
        </div>

        <div class="mt-8">
            <p class="mb-2 px-3 text-xs font-extrabold uppercase tracking-widest text-slate-400">Categories</p>
            <ul class="m-0 list-none space-y-0.5 p-0">
                @foreach ($categories as $category)
                    <li>
                        <a
                            href="{{ $category->getUrl() }}"
                            class="flex items-center justify-between gap-3 rounded-lg px-3 py-1.5 text-sm font-semibold no-underline {{ $page->isActive('/categories/'.$category->getFilename()) ? 'bg-brand-100 text-brand-700 dark:bg-blue-950 dark:text-blue-300' : 'text-slate-600 hover:bg-slate-200/70 hover:text-slate-950 dark:text-slate-400 dark:hover:bg-slate-900 dark:hover:text-white' }}"
                        >
                            <span class="truncate">{{ $category->title }}</span>
                            <span class="text-xs font-medium tabular-nums text-slate-400">{{ count($category->posts($posts)) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>

    <div class="mt-8 border-t border-slate-200 px-3 pt-5 text-xs leading-5 text-slate-400 dark:border-slate-800">
        <p>&copy; {{ date('Y') }} {{ $page->siteName }}</p>
    </div>
</aside>
