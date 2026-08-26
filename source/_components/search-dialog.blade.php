<dialog
    data-search-dialog
    class="m-auto w-[calc(100%-2rem)] max-w-2xl overflow-hidden rounded-2xl border border-slate-200 bg-white p-0 text-left shadow-2xl dark:border-slate-700 dark:bg-slate-900"
>
    <div class="flex items-center gap-3 border-b border-slate-200 px-4 dark:border-slate-800">
        <svg class="size-5 shrink-0 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>
        </svg>
        <label for="global-search" class="sr-only">Search problems</label>
        <input
            id="global-search"
            data-search-input
            type="search"
            autocomplete="off"
            placeholder="Search by title, category, or solution..."
            class="h-16 min-w-0 flex-1 border-0 bg-transparent text-base text-slate-950 outline-none placeholder:text-slate-400 dark:text-white"
        >
        <button type="button" data-search-close class="rounded-md border border-slate-200 px-2 py-1 text-xs font-semibold text-slate-500 dark:border-slate-700 dark:text-slate-400">ESC</button>
    </div>

    <div data-search-results class="max-h-[60vh] overflow-y-auto p-2">
        <div class="px-3 py-10 text-center text-sm text-slate-500">
            Start typing to search all {{ count($posts) }} problems.
        </div>
    </div>

    <div class="flex items-center gap-4 border-t border-slate-200 px-4 py-2 text-[11px] font-semibold text-slate-400 dark:border-slate-800">
        <span><kbd class="font-mono">↑↓</kbd> Navigate</span>
        <span><kbd class="font-mono">↵</kbd> Open</span>
        <span class="ml-auto">Powered by Fuse.js</span>
    </div>
</dialog>
