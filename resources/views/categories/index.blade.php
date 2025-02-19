@extends('layouts.main')

@section('container')
    <div class="categories-container">
        @foreach ($categories as $category)
            <a href="{{ url('/categories/' . $category->category_slug) }}">
                <p class="categories_name">{{ $category->category_name }}</p>
            </a>
        @endforeach
    </div>
@endsection
