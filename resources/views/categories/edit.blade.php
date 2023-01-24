@extends('layouts.app')
@section('content')
    <main>
        <h3>Edit Category</h3>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            @include('categories.partials.form')
            <button class="btn btn-sm btn-dark">Update</button>
        </form>
    </main>
@endsection
