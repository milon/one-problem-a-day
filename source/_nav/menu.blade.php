<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} - Problems" href="/problems"
        class="ml-6 text-gray-700 hover:text-indigo-600 {{ $page->isActive('/problems') ? 'active text-indigo-600' : '' }}">
        Problems
    </a>

    <a title="{{ $page->siteName }} - About" href="/about"
        class="ml-6 text-gray-700 hover:text-indigo-600 {{ $page->isActive('/about') ? 'active text-indigo-600' : '' }}">
        About
    </a>
</nav>
