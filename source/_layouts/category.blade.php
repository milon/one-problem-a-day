@extends('_layouts.main')

@section('body')
    @include('_components.problem-index', [
        'problemPosts' => $page->posts($posts),
        'indexTitle' => $page->title,
        'indexDescription' => $page->description ?? 'Browse problems in this category.',
        'selectedCategory' => $page->getFilename(),
    ])
@stop
