@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-start">
        <div>
            <img src="{{ $product->image ? $product->image->url() : "https://dummyimage.com/250x250/f7f7f7/8f8f8f.png" }}" style="width: 250px; height: 250px; object-fit: cover;" class="rounded" alt="{{ $product->name }}">
        </div>
        <div class="mx-3">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <h3 class="text-muted font-bold">{{ $product->price }}</h3>
            <p class="text-muted">Added {{ $product->created_at->diffForHumans() }}</p>
            <div class="mb-3">
                <p class="m-0 p-0">Categories:</p>
                @foreach ($product->categories as $category)
                <span class="badge bg-secondary }} me-2">
                    {{ $category->name }}
                </span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
