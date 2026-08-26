---
title: Problems
description: Browse all solved problems.
---
@extends('_layouts.main')

@section('body')
    @include('_components.problem-index', [
        'problemPosts' => $posts,
        'indexTitle' => 'All problems',
        'indexDescription' => 'Search, sort, and filter the complete problem archive.',
        'selectedCategory' => null,
    ])
@stop
