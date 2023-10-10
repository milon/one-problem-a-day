@extends('_layouts.main')

@section('body')
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2">
    @endif

    <h1 class="leading-none mb-2">{{ $page->title }}</h1>

    @if ($page->tags)
        @foreach ($page->tags as $i => $tag)
            <span class="inline-block bg-gray-300 hover:bg-indigo-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px">
                {{ $tag }}
            </span>
        @endforeach
    @endif

    <div class="border-b border-indigo-200 mb-10 pb-4" v-pre>
        @yield('content')
    </div>
@endsection