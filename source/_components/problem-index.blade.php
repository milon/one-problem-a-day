<section data-problem-index class="scroll-mt-24">
    <div class="mb-8 flex flex-col gap-5 border-b border-slate-200 pb-8 dark:border-slate-800 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="mb-2 font-mono text-xs font-semibold uppercase tracking-[0.2em] text-brand-600 dark:text-blue-400">Problem library</p>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl dark:text-white">{{ $indexTitle }}</h1>
            <p class="mt-3 max-w-2xl text-slate-500 dark:text-slate-400">{{ $indexDescription }}</p>
        </div>
        <div class="shrink-0 font-mono text-sm text-slate-500">
            <strong data-visible-count class="text-slate-950 dark:text-white">{{ count($problemPosts) }}</strong>
            <span> / {{ count($problemPosts) }} problems</span>
        </div>
    </div>

    <div class="mb-5 grid gap-3 sm:grid-cols-[minmax(0,1fr)_12rem_12rem]">
        <label class="relative">
            <span class="sr-only">Filter problems</span>
            <svg class="pointer-events-none absolute top-3 left-3.5 size-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>
            </svg>
            <input
                data-problem-query
                type="search"
                placeholder="Filter by problem name..."
                class="h-10 w-full rounded-lg border border-slate-200 bg-white pr-3 pl-10 text-sm text-slate-950 outline-none transition focus:border-brand-500 focus:ring-2 focus:ring-brand-100 dark:border-slate-800 dark:bg-slate-900 dark:text-white dark:focus:ring-blue-950"
            >
        </label>

        <label>
            <span class="sr-only">Filter by category</span>
            <select data-problem-category class="h-10 w-full rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700 outline-none focus:border-brand-500 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->getFilename() }}" {{ ($selectedCategory ?? '') === $category->getFilename() ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </label>

        <label>
            <span class="sr-only">Filter by time complexity</span>
            <select data-problem-complexity class="h-10 w-full rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700 outline-none focus:border-brand-500 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300">
                <option value="">All complexities</option>
                <option value="constant">Constant</option>
                <option value="logarithmic">Logarithmic</option>
                <option value="linear">Linear</option>
                <option value="linearithmic">Linearithmic</option>
                <option value="quadratic">Quadratic</option>
                <option value="exponential">Exponential</option>
                <option value="other">Other</option>
                <option value="unknown">Not recorded</option>
            </select>
        </label>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-panel dark:border-slate-800 dark:bg-slate-900">
        <div class="overflow-x-auto">
            <table class="problem-table w-full border-collapse text-left text-sm">
                <thead class="border-b border-slate-200 bg-slate-50 text-xs uppercase tracking-wider text-slate-500 dark:border-slate-800 dark:bg-slate-900/80">
                    <tr>
                        <th scope="col" data-sort="title" aria-sort="none" class="px-4 py-3.5 font-bold sm:px-5">Problem</th>
                        <th scope="col" class="hidden px-4 py-3.5 font-bold md:table-cell">Category</th>
                        <th scope="col" data-sort="complexity" aria-sort="none" class="hidden px-4 py-3.5 font-bold sm:table-cell">Time</th>
                        <th scope="col" data-sort="date" aria-sort="descending" class="px-4 py-3.5 text-right font-bold sm:px-5">Solved</th>
                    </tr>
                </thead>
                <tbody data-problem-rows class="divide-y divide-slate-100 dark:divide-slate-800">
                    @foreach ($problemPosts as $post)
                        @php($complexity = $post->getComplexity())
                        <tr
                            data-problem-row
                            data-title="{{ strtolower($post->title) }}"
                            data-categories="{{ implode(',', $post->categories ?? []) }}"
                            data-complexity="{{ $complexity['bucket'] }}"
                            data-date="{{ $post->getDate()->format('Y-m-d') }}"
                            class="group hover:bg-slate-50 dark:hover:bg-slate-800/60"
                        >
                            <td class="px-4 py-3.5 sm:px-5">
                                <a href="{{ $post->getUrl() }}" class="font-bold text-slate-900 no-underline group-hover:text-brand-600 dark:text-slate-100 dark:group-hover:text-blue-400">{{ $post->title }}</a>
                                <div class="mt-1 flex flex-wrap gap-1 md:hidden">
                                    @foreach ($post->categories ?? [] as $category)
                                        <span class="text-xs text-slate-400">{{ $category }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="hidden px-4 py-3.5 md:table-cell">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($post->categories ?? [] as $category)
                                        <a href="/categories/{{ $category }}" class="rounded-md bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-600 no-underline hover:bg-brand-100 hover:text-brand-700 dark:bg-slate-800 dark:text-slate-300">{{ str_replace('-', ' ', $category) }}</a>
                                    @endforeach
                                </div>
                            </td>
                            <td class="hidden px-4 py-3.5 font-mono text-xs text-slate-600 sm:table-cell dark:text-slate-400">{{ $complexity['time'] ?? '—' }}</td>
                            <td class="whitespace-nowrap px-4 py-3.5 text-right font-mono text-xs text-slate-400 sm:px-5">{{ $post->getDate()->format('M j, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div data-problem-empty class="hidden px-6 py-16 text-center">
            <p class="font-bold text-slate-900 dark:text-white">No matching problems</p>
            <p class="mt-1 text-sm text-slate-500">Try clearing one of the filters.</p>
        </div>
    </div>

    <nav data-problem-pager class="mt-5 hidden flex-col items-center justify-between gap-4 sm:flex-row" aria-label="Problem index pagination">
        <p data-pager-info class="text-sm text-slate-500"></p>

        <div class="flex items-center gap-1">
            <button type="button" data-pager-prev class="h-9 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-600 enabled:hover:bg-slate-100 disabled:opacity-40 dark:border-slate-800 dark:text-slate-300 dark:enabled:hover:bg-slate-900">Previous</button>
            <div data-pager-pages class="flex items-center gap-1"></div>
            <button type="button" data-pager-next class="h-9 rounded-lg border border-slate-200 px-3 text-sm font-semibold text-slate-600 enabled:hover:bg-slate-100 disabled:opacity-40 dark:border-slate-800 dark:text-slate-300 dark:enabled:hover:bg-slate-900">Next</button>
        </div>
    </nav>
</section>
