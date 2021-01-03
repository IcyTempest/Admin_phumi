@section('title','All post')
@extends('layouts.layout')
@section('all_post')
<div class="post-head">
        <a href="{{ route('user.profile',$post->user_id) }}">
            <img src="/images/uploads/{{ $post->user_imageUrl }}" width="100px" class="post-user-image shadow" alt="{{ $post->user_imageUrl }}">
        </a>
        <div class="post-head-detail ml-4">
            <a href="{{ route('user.profile',$post->user_id) }}"><h4 class="text-{{ $darkmode ? "light":'dark' }}">{{ $post->user_name }}</h4></a>
            <small class="text-muted">{{ $post->getDays($post->created_at) }}</small>
        </div>
    </div>

</div>
<div class="post-status">
    <p style="overflow: scroll">{{ $post->status }}</p>
</div>

@if ($post->imageUrl !== null)
<div class="post-image">
    <img src="/images/uploads/{{ $post->imageUrl }}" width="100%" alt="{{ $post->imageUrl }}">
</div>
@endif

<ul class="d-flex justify-content-around align-items-center" style="list-style: none; padding: 5px;width:100%;border-top:1px solid {{ $darkmode ? 'white':'00001' }};margin-bottom: -5px">
    <li>
        <a href="{{ route('post.liker',$post->id) }}"><i class="text-primary">{{ $post->likes()->count() }}</i></a>
    </li>
    <li>
        <a href="{{ route('post.disliker',$post->id) }}"><i class="text-danger" aria-hidden="true">{{ $post->dislikes()->count() }}</i></a>
    </li>
    <li>
        <a href="{{ route('post.commenter',$post->id) }}"><i class="text-success" aria-hidden="true">{{ $post->comments()->count() }}</i></a>
    </li>
    <li>
        <a href="{{ route('post.sharer',$post->id) }}"><i class="text-info" aria-hidden="true">{{ $post->shares()->count() }}</i></a>
    </li>
</ul>
<div class="post-buttons ">
    <ul style="background-color: {{$darkmode ? '#535353':'white'}}; ">
        <li>
            <form action="{{ route('like.create',$post->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-lg">
                    <h1>
                        <i class="fa fa-thumbs-up text-primary" aria-hidden="true"></i>
                    </h1>
                </button>
            </form>
        </li>
        <li>
            <div class="post-button-divider"></div>
        </li>
        <li>
            <form action="{{ route('dislike.create',$post->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-lg">
                    <h1>
                        <i class="fa fa-thumbs-down text-danger" aria-hidden="true"></i>
                    </h1>
                </button>
            </form>
        </li>
        <li>
            <div class="post-button-divider"></div>
        </li>
        <li>
            <a href="{{ route('comment.index',$post->id) }}" class="btn btn-lg">
                <h1>
                    <i class="fa fa-commenting text-success" aria-hidden="true"></i>
                </h1>
            </a>
        </li>
        <li>
            <div class="post-button-divider"></div>
        </li>
        <li>
            <a href="{{ route('share.create',$post->id) }}" class="btn btn-lg">
                <h1>
                    <i class="fa fa-share text-info" aria-hidden="true"></i>
                </h1>
            </a>
        </li>
    </ul>
</div>
@endsection