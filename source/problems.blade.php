---
title: Problems
description: The list of problems that we have solved.
pagination:
    collection: posts
---
@extends('_layouts.main')

@section('body')
    <h1>Problems</h1>

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
