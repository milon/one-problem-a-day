---
title: Problems
pagination:
    collection: posts
---
@extends('_layouts.main')

@section('body')
    <h1 class="mb-6">{{ $page->title }}</h1>
    <hr class="border-b my-6">

    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')

        @if ($post != $pagination->items->last())
            <hr class="border-b my-6">
        @endif
    @endforeach

    <div class="clearfix">
        @include('_components.pagination')
    </div>
@stop
