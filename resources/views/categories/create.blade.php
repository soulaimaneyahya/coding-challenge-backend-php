@extends('layouts.app')
@section('content')
    <main>
        <h3>Create Category</h3>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @include('categories.partials.form')
            <button type="submit" class="btn btn-sm btn-dark">Create</button>
        </form>
    </main>
@endsection
