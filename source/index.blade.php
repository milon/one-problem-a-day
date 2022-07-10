---
title: Categories
description: The list of all Categories.
pagination:
    collection: categories
    perPage: 50
---
@extends('_layouts.main')

@section('body')
    <p>Here is the list of categories of the problems-</p>

    <ul>
        <li><a href="/categories/hashmap">Hashmap</a></li>
        <li><a href="/categories/tree">Tree</a></li>
    </ul>
@stop
