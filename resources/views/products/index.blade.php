@extends('layouts.app')
@section('content')
    <main>
        <div class="d-flex align-items-center justify-content-between">
            <h3>{{ ucwords(Request::segment(1)) }}</h3>
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-dark">Create</a>
        </div>
        <div>
            <form method="GET" class="d-flex align-items-center justify-content-start my-3">
                <div class="form-group">
                    <select class="form-select" id="sort_by" name="sort_by">
                        <option value="name" @if(request('sort_by') == 'name') selected @endif>Product Name</option>
                        <option value="price" @if(request('sort_by') == 'price') selected @endif>Product Price</option>
                    </select>
                </div>
                <div class="form-group mx-2">
                    <select class="form-select" id="order" name="order">
                        <option value="asc" @if(request('order') == 'asc') selected @endif>ASC</option>
                        <option value="desc" @if(request('order') == 'desc') selected @endif>DESC</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Filter</button>
                @if(request('sort_by') || request('order'))
                    <div class="mx-2">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear</a>
                    </div>
                @endif
            </form>
        </div>
        <div class="my-4">
            <table class="table m-0 p-0">
                <thead>
                <tr class="fw-bold">
                    <th scope="col">{{ __('Image') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">{{ __('Created') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                @include('products.partials.product')
                @empty
                <tr>
                    <td class="text-center" colspan="4">No product Found</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            <div class="mt-2">
                {{ $products->links() }}
            </div>
        </div>
    </main>
@endsection
