<nav id="js-nav-menu" class="w-auto px-2 pt-6 pb-2 bg-gray-200 shadow hidden lg:hidden">
    <ul class="my-0 list-none">
        <li class="pl-4 block">
            <a
                title="{{ $page->siteName }}"
                href="/"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/') ? 'active text-indigo-500' : 'text-gray-800 hover:text-indigo-500' }}"
            >Home</a>
        </li>
        <li class="pl-4 block">
            <a
                title="{{ $page->siteName }} Problems"
                href="/problems"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/problems') ? 'active text-indigo-500' : 'text-gray-800 hover:text-indigo-500' }}"
            >Problems</a>
        </li>
        <li class="pl-4 block">
            <a
                title="{{ $page->siteName }} About"
                href="/about"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/about') ? 'active text-indigo-500' : 'text-gray-800 hover:text-indigo-500' }}"
            >About</a>
        </li>
    </ul>
</nav>
