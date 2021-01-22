@extends('layouts.app')

@section('title', trans('messages.home'))

@section('content')
    @include('elements.slider')
    @include('elements.serverinfo')
    <div style="height: 30px"></div> 
    <div class="h3 deco-h"><span> <span class="text-red">latest</span> news</span></div>
    <div style="height: 30px"></div> 
    <div class="news-box">
        <div class="box-list">
            <div class="nano">
                <div id="defaultOpen" class="nano-content">
                    @foreach($posts as $post)
                        <div class="box-item tablinks" onclick="horizonTab(event, 'tab-{{ $post->id }}')">
                            <div class="box-itemImage">
                                @if($post->hasImage())
                                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}">
                                @endif
                            </div>
                            <h6 class="box-itemTitle">{{ Str::limit(strip_tags($post->title), 55)  }}</h6>
                            <p class="box-itemContent">{{ Str::limit(strip_tags($post->content), 55) }}</p>
                            <div class="box-itemDate">
                                <i class="fas fa-calendar-alt"></i> {{ date('d-m-Y', strtotime($post->published_at)) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="box-each">
            @foreach($posts as $post)
                <div id="tab-{{ $post->id }}" class="nano tab-content">
                    <div class="nano-content">
                        <div class="box-itemImage">
                            @if($post->hasImage())
                                <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}">
                            @endif
                            <span class="item-category">
                                <p>bsdkjakd</p>
                            </span>
                        </div>
                        <h4>{{ Str::limit(strip_tags($post->title), 55)  }}</h4>
                            <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                            <a href="{{ route('posts.show', $post) }}">READMMORE</a>
                        <div class="date"><i class="fas fa-calendar-alt"></i> {{ date('d-m-Y', strtotime($post->published_at)) }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div style="height: 30px"></div>
    <div class="container">
        <div class="row">
            <div class="main-content col-lg-8">
                <div class="h4 deco-h"><span>Most viewed</span></div>
                <div style="height: 30px"></div>
                <div class="row">
                    @foreach($mostvieweds as $mostviewed)
                        <div class="col-md-6">
                            <div class="blog-box">
                                <a href="{{ route('posts.show', $mostviewed) }}" class="post-image">
                                    @if($post->hasImage())
                                        <img src="{{ $mostviewed->imageUrl() }}" alt="{{ $mostviewed->title }}">
                                    @endif
                                    <span class="comment-count" style="color: #494949;">
                                        {{ $mostviewed->comments->count() }}
                                    </span>
                                </a>
                                <div class="gap"></div>
                                <h6>
                                    {{ Str::limit(strip_tags($mostviewed->title), 55)  }}
                                </h6>
                                <div class="postby">
                                    <img src="{{ $post->author->getAvatar() }}" alt="" class="rounded-circle">
                                </div>
                                <div class="gap"></div>
                                <div class="post-text">
                                    <p>{{ Str::limit(strip_tags($mostviewed->content), 150) }}</p>
                                </div>
                                <div class="gap"></div>
                                <button type="button" class="btn btn-secondary readmore" href="{{ route('posts.show', $mostviewed) }}">READMORE</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="right-widget col-lg-4">
                @include('elements.widgets')
            </div>
        </div>
    </div>
   
    
@endsection

@push('styles')
    <style>
        .home-background {
            height: 500px;
        }

        .discord-widget {
            border: none;
            width: 100%;
        }
    </style>
@endpush
