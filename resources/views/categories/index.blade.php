@extends('layouts.app')
@section('content')
    <main>
        <div class="d-flex align-items-center justify-content-between">
            <h3>{{ ucwords(Request::segment(1)) }}</h3>
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-dark">Create</a>
        </div>
        <div class="my-4">
            <table class="table m-0 p-0">
                <thead>
                <tr class="fw-bold">
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Parent Category') }}</th>
                    <th scope="col">{{ __('Products Count') }}</th>
                    <th scope="col">{{ __('Created') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                @include('categories.partials.category')
                @empty
                <tr>
                    <td class="text-center" colspan="5">No Category Found</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            <div class="mt-2">
                {{ $categories->links() }}
            </div>
        </div>
    </main>
@endsection
