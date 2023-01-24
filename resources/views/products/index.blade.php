@extends('layouts.app')
@section('content')
    <main>
        <div class="d-flex align-items-center justify-content-between">
            <h3>{{ ucwords(Request::segment(1)) }}</h3>
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-dark">Create</a>
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
