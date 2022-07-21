---
title: Problem Categories
pagination:
    collection: categories
    perPage: 30
---
@extends('_layouts.main')

@section('body')
    <h1 class="mb-6">{{ $page->title }}</h1>
    <hr class="border-b my-6">

    @foreach ($pagination->items as $category)
        <p class="m-0">
            <a
                href="{{ $category->getUrl() }}"
                title="Read more - {{ $category->title }}"
                class="text-2xl text-gray-900 font-semibold"
            >
                {{ $category->title }} <span class="text-gray-700 font-medium text-base"> ({{ count($category->posts($posts)) }}) </span>
            </a> 
        </p>
    @endforeach
@endsection