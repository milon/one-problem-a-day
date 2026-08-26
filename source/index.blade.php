---
title: All Problems
description: Browse and filter every solved data structures and algorithms problem.
---
@extends('_layouts.main')

@section('body')
    @include('_components.problem-index', [
        'problemPosts' => $posts,
        'indexTitle' => 'All problems',
        'indexDescription' => 'A searchable reference of every problem I have solved, with categories and complexity at a glance.',
        'selectedCategory' => null,
    ])
@endsection