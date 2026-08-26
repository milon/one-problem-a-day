import hljs from 'highlight.js/lib/core';
import python from 'highlight.js/lib/languages/python';
import Fuse from 'fuse.js';
import '../css/main.css';

hljs.registerLanguage('python', python);

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightElement(block);
});

const escapeHtml = (value) => String(value ?? '')
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#039;');

const stripHtml = (value) => {
    const element = document.createElement('div');
    element.innerHTML = value ?? '';

    return element.textContent ?? '';
};

const themeToggle = document.querySelector('[data-theme-toggle]');

themeToggle?.addEventListener('click', () => {
    const shouldUseDark = !document.documentElement.classList.contains('dark');
    document.documentElement.classList.toggle('dark', shouldUseDark);
    document.documentElement.classList.toggle('light', !shouldUseDark);
    localStorage.setItem('theme', shouldUseDark ? 'dark' : 'light');
});

const sidebar = document.querySelector('[data-sidebar]');
const sidebarBackdrop = document.querySelector('[data-sidebar-backdrop]');
const sidebarToggle = document.querySelector('[data-sidebar-toggle]');

const setSidebarOpen = (isOpen) => {
    sidebar?.classList.toggle('-translate-x-full', !isOpen);
    sidebarBackdrop?.classList.toggle('hidden', !isOpen);
    sidebarToggle?.setAttribute('aria-expanded', String(isOpen));
    document.body.classList.toggle('overflow-hidden', isOpen);
};

sidebarToggle?.addEventListener('click', () => setSidebarOpen(true));
document.querySelector('[data-sidebar-close]')?.addEventListener('click', () => setSidebarOpen(false));
sidebarBackdrop?.addEventListener('click', () => setSidebarOpen(false));

const searchDialog = document.querySelector('[data-search-dialog]');
const searchInput = document.querySelector('[data-search-input]');
const searchResults = document.querySelector('[data-search-results]');
let searchIndex;
let selectedResult = 0;

const loadSearchIndex = async () => {
    if (searchIndex) {
        return searchIndex;
    }

    const response = await fetch('/index.json');
    const items = await response.json();
    searchIndex = new Fuse(items, {
        threshold: 0.35,
        minMatchCharLength: 2,
        keys: [
            { name: 'title', weight: 0.6 },
            { name: 'categories', weight: 0.25 },
            { name: 'snippet', weight: 0.15 },
        ],
    });

    return searchIndex;
};

const renderSearchResults = async () => {
    const query = searchInput.value.trim();

    if (!query) {
        searchResults.innerHTML = '<div class="px-3 py-10 text-center text-sm text-slate-500">Start typing to search all problems.</div>';
        return;
    }

    searchResults.innerHTML = '<div class="px-3 py-10 text-center text-sm text-slate-500">Searching…</div>';

    try {
        const fuse = await loadSearchIndex();
        const results = fuse.search(query, { limit: 8 });
        selectedResult = 0;

        if (!results.length) {
            searchResults.innerHTML = `<div class="px-3 py-10 text-center text-sm text-slate-500">No results for <strong>${escapeHtml(query)}</strong>.</div>`;
            return;
        }

        searchResults.innerHTML = results.map(({ item }, index) => `
            <a
                href="${escapeHtml(item.link)}"
                data-search-result
                class="${index === 0 ? 'is-selected ' : ''}block rounded-xl px-3 py-3 no-underline hover:bg-brand-50 dark:hover:bg-slate-800"
            >
                <span class="block font-bold text-slate-950 dark:text-white">${escapeHtml(item.title)}</span>
                <span class="mt-0.5 block truncate text-sm font-normal text-slate-500 dark:text-slate-400">${escapeHtml(stripHtml(item.snippet))}</span>
                <span class="mt-1.5 flex gap-2 font-mono text-[11px] text-slate-400">
                    <span>${escapeHtml((item.categories ?? []).join(' · '))}</span>
                    ${item.time ? `<span>· ${escapeHtml(item.time)}</span>` : ''}
                </span>
            </a>
        `).join('');
    } catch {
        searchResults.innerHTML = '<div class="px-3 py-10 text-center text-sm text-red-600">Search could not be loaded.</div>';
    }
};

const openSearch = () => {
    if (!searchDialog?.open) {
        searchDialog?.showModal();
    }
    searchInput?.focus();
    loadSearchIndex().catch(() => {});
};

document.querySelectorAll('[data-search-open]').forEach((button) => button.addEventListener('click', openSearch));
document.querySelector('[data-search-close]')?.addEventListener('click', () => searchDialog?.close());
searchInput?.addEventListener('input', renderSearchResults);
searchDialog?.addEventListener('click', (event) => {
    if (event.target === searchDialog) {
        searchDialog.close();
    }
});

const isTypingTarget = (target) => target instanceof HTMLElement
    && (target.isContentEditable || ['INPUT', 'TEXTAREA', 'SELECT'].includes(target.tagName));

document.addEventListener('keydown', (event) => {
    if (event.key === '/' && !event.metaKey && !event.ctrlKey && !event.altKey && !isTypingTarget(event.target)) {
        event.preventDefault();
        openSearch();
        return;
    }

    if (!searchDialog?.open) {
        return;
    }

    const results = [...searchResults.querySelectorAll('[data-search-result]')];

    if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
        event.preventDefault();
        const offset = event.key === 'ArrowDown' ? 1 : -1;
        selectedResult = (selectedResult + offset + results.length) % results.length;
        results.forEach((result, index) => result.classList.toggle('is-selected', index === selectedResult));
        results[selectedResult]?.scrollIntoView({ block: 'nearest' });
    }

    if (event.key === 'Enter' && results[selectedResult]) {
        window.location.href = results[selectedResult].href;
    }
});

const PROBLEMS_PER_PAGE = 50;

document.querySelectorAll('[data-problem-index]').forEach((index) => {
    const queryInput = index.querySelector('[data-problem-query]');
    const categorySelect = index.querySelector('[data-problem-category]');
    const complexitySelect = index.querySelector('[data-problem-complexity]');
    const rowsContainer = index.querySelector('[data-problem-rows]');
    const rows = [...index.querySelectorAll('[data-problem-row]')];
    const visibleCount = index.querySelector('[data-visible-count]');
    const emptyState = index.querySelector('[data-problem-empty]');
    const pager = index.querySelector('[data-problem-pager]');
    const pagerInfo = index.querySelector('[data-pager-info]');
    const pagerPages = index.querySelector('[data-pager-pages]');
    const previousButton = index.querySelector('[data-pager-prev]');
    const nextButton = index.querySelector('[data-pager-next]');

    let matches = rows;
    let currentPage = 1;

    const pageButtonClass = (isCurrent) => `size-9 rounded-lg border text-sm font-semibold ${isCurrent
        ? 'border-brand-600 bg-brand-600 text-white'
        : 'border-slate-200 text-slate-600 hover:bg-slate-100 dark:border-slate-800 dark:text-slate-300 dark:hover:bg-slate-900'}`;

    const renderPageButtons = (totalPages) => {
        const numbers = [...new Set([1, currentPage - 1, currentPage, currentPage + 1, totalPages])]
            .filter((number) => number >= 1 && number <= totalPages)
            .sort((left, right) => left - right);

        pagerPages.replaceChildren();

        numbers.forEach((number, position) => {
            if (position > 0 && number - numbers[position - 1] > 1) {
                const gap = document.createElement('span');
                gap.className = 'px-1 text-sm text-slate-400';
                gap.textContent = '…';
                pagerPages.append(gap);
            }

            const button = document.createElement('button');
            button.type = 'button';
            button.className = pageButtonClass(number === currentPage);
            button.textContent = number;
            button.setAttribute('aria-label', `Go to page ${number}`);

            if (number === currentPage) {
                button.setAttribute('aria-current', 'page');
            }

            button.addEventListener('click', () => goToPage(number));
            pagerPages.append(button);
        });
    };

    const render = () => {
        const totalPages = Math.max(1, Math.ceil(matches.length / PROBLEMS_PER_PAGE));
        currentPage = Math.min(currentPage, totalPages);

        const start = (currentPage - 1) * PROBLEMS_PER_PAGE;
        const pageRows = matches.slice(start, start + PROBLEMS_PER_PAGE);

        rows.forEach((row) => row.classList.add('hidden'));
        pageRows.forEach((row) => row.classList.remove('hidden'));

        visibleCount.textContent = matches.length;
        emptyState.classList.toggle('hidden', matches.length > 0);

        pagerInfo.textContent = matches.length
            ? `Showing ${start + 1}–${start + pageRows.length} of ${matches.length}`
            : '';
        previousButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;
        renderPageButtons(totalPages);

        pager.classList.toggle('hidden', totalPages < 2);
        pager.classList.toggle('flex', totalPages > 1);
    };

    function goToPage(page) {
        currentPage = page;
        render();
        index.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    const applyFilters = () => {
        const query = queryInput.value.trim().toLowerCase();
        const category = categorySelect.value;
        const complexity = complexitySelect.value;

        matches = rows.filter((row) => {
            const categories = row.dataset.categories.split(',');

            return (!query || row.dataset.title.includes(query))
                && (!category || categories.includes(category))
                && (!complexity || row.dataset.complexity === complexity);
        });

        currentPage = 1;
        render();
    };

    queryInput.addEventListener('input', applyFilters);
    categorySelect.addEventListener('change', applyFilters);
    complexitySelect.addEventListener('change', applyFilters);
    previousButton.addEventListener('click', () => goToPage(currentPage - 1));
    nextButton.addEventListener('click', () => goToPage(currentPage + 1));

    index.querySelectorAll('[data-sort]').forEach((header) => {
        header.addEventListener('click', () => {
            const key = header.dataset.sort;
            const currentDirection = header.getAttribute('aria-sort');
            const direction = currentDirection === 'ascending' ? 'descending' : 'ascending';
            const multiplier = direction === 'ascending' ? 1 : -1;

            index.querySelectorAll('[data-sort]').forEach((item) => item.setAttribute('aria-sort', 'none'));
            header.setAttribute('aria-sort', direction);

            rows.sort((left, right) => left.dataset[key].localeCompare(right.dataset[key]) * multiplier);
            rows.forEach((row) => rowsContainer.append(row));
            applyFilters();
        });
    });

    applyFilters();
});

document.querySelectorAll('.prose-content pre').forEach((pre) => {
    const wrapper = document.createElement('div');
    wrapper.className = 'code-block';
    pre.parentNode.insertBefore(wrapper, pre);
    wrapper.append(pre);

    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'code-copy';
    button.textContent = 'Copy';
    button.addEventListener('click', async () => {
        await navigator.clipboard.writeText(pre.textContent);
        button.textContent = 'Copied';
        window.setTimeout(() => {
            button.textContent = 'Copy';
        }, 1500);
    });
    wrapper.append(button);
});

const postContent = document.querySelector('[data-post-content]');
const toc = document.querySelector('[data-toc]');
const tocContainer = document.querySelector('[data-toc-container]');

if (postContent && toc) {
    const headings = [...postContent.querySelectorAll('h2, h3')];
    const slugs = new Map();

    headings.forEach((heading) => {
        const baseSlug = heading.textContent.toLowerCase()
            .trim()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-|-$/g, '') || 'section';
        const count = slugs.get(baseSlug) ?? 0;
        const slug = count ? `${baseSlug}-${count + 1}` : baseSlug;
        slugs.set(baseSlug, count + 1);
        heading.id = heading.id || slug;

        const link = document.createElement('a');
        link.href = `#${heading.id}`;
        link.textContent = heading.textContent;
        link.className = `block border-l-2 border-transparent py-1.5 pr-2 text-sm font-semibold text-slate-500 no-underline hover:border-brand-500 hover:text-brand-600 ${heading.tagName === 'H3' ? 'pl-6' : 'pl-4'}`;
        toc.append(link);
    });

    tocContainer?.classList.toggle('xl:block', headings.length > 0);
}

