@extends('app.layouts.master')

@section('title', 'Categories')

@section('content')
    <div class="wrapper">
        <section class="featured-section">
            <br>
            <br>
            <h1>Categories</h1>
            <div class="categories-section">
                <div class="categories-container">
                    @foreach ($categories as $category)
                        <a href="{{route('category.show',$category->id)}}" class="category-item">
                            {{ $category->name }}
                        </a>
                        @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection