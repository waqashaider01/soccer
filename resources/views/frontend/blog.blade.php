@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
@endpush
@section('content')
    <section class="blog-hero">
        <div class="heading">
            <h1>Blog</h1>
            <p style="font-size:25px;">Keeping your informed: stay up-to-date with our latest articles, news and <br> events
                in the world of soccer</p>
        </div>
    </section>
    <section class="blogs">
        <div class="container mt-4 mb-4">
            <div class="row">
                <div class="col-md-8">
                    @if (count($blogs) > 0)
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="card blog-card">
                                        <a href="{{ route('blog-detail', $blog->id) }}" class="img-link">
                                            <img src="{{ asset('images/blog/' . $blog->image) }}" alt="{{ $blog->title }}"
                                                class="blog">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-title">
                                                {{ $blog->title }}
                                            </p>
                                            @if ($blog->user->type == 'admin')
                                                <p class="author">by Soccerworldlink Media</p>
                                            @else
                                                <p class="author">by {{ $blog->user->name }}</p>
                                            @endif
                                            <div class="bottom">
                                                <div class="left">
                                                    <a href="{{ route('blog-detail', $blog->id) }}">Continue Reading</a>
                                                </div>
                                                <div class="right">
                                                    {{-- <span><i class="far fa-heart"></i> 1</span> --}}
                                                    <span><i class="far fa-eye"></i> {{ $blog->reads }}</span>
                                                    {{-- <span><i class="fas fa-comment-dots"></i> 0</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center">
                            <h1>No Blogs Found</h1>
                        </div>
                    @endif

                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-11 offset-md-1">
                            <div class="strike">
                                <span>Recent Posts</span>
                            </div>
                            @if (count($recentBlogs) > 0)
                                @foreach ($recentBlogs as $recentBlog)
                                    <div class="card mb-3 latest-blog">
                                        <div class="row no-gutters">
                                            <div class="col-md-5">
                                                <a href="{{ route('blog-detail', $recentBlog->id) }}" class="img-link">
                                                    <img src="{{ asset('images/blog/' . $recentBlog->image) }}"
                                                        alt="{{ $recentBlog->title }}" class="blog">
                                                </a>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <a href="{{ route('blog-detail', $recentBlog->id) }}"
                                                        class="card-title">
                                                        {{ $recentBlog->title }}</a>
                                                    <small class="published">by
                                                        @if ($blog->user->type == 'admin')
                                                            Soccerworldlink Media
                                                        @else
                                                            {{ $blog->user->name }}
                                                        @endif |
                                                        {{ $recentBlog->created_at->diffForHumans() }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    <h1>No Blogs Found</h1>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
    </section>
@endsection
