@extends('layouts.app')
@section('content')
    <div>
        <h3>{{ $category->name }}</h3>
        @if ($category->parent_category_id)
        <h4>Parent Category: {{ $category->parent->name }}</h4>
        @else
        <h4>Doesn't have Parent Category</h4>
        @endif
        <p class="text-muted">Added {{ $category->created_at->diffForHumans() }}</p>
    </div>
@endsection
