@extends('layouts.app')
@section('content')
    <main>
        <h3>Edit Product</h3>
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('products.partials.form')
            <button class="btn btn-sm btn-dark">Update</button>
        </form>
    </main>
@endsection
