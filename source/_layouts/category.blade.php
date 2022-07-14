@extends('_layouts.main')

@section('body')
    <h1>{{ $page->title }} ({{ count($page->posts($posts)) }})</h1>

    <div class="text-2xl border-b border-indigo-200 mb-6 pb-6">
        @yield('content')
    </div>

    @forelse ($page->posts($posts) as $post)
        @include('_components.category-preview-inline')         
    @empty
        <p>No posts yet!</p>
    @endforelse
@stop
