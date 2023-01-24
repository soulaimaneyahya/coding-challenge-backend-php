@extends('layouts.app')
@section('content')
    <main>
        <h3>Create Product</h3>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('products.partials.form')
            <button type="submit" class="btn btn-sm btn-dark">Create</button>
        </form>
    </main>
@endsection
