@extends('layouts.layout')
@section('title','Report')
@section('report')
@section('report_active','active')


<div class="post mb-4" style="border: 1px solid #535353" style="position: relative;">
    <div class="d-flex flex-column justify-content-between" style="position: relative">
        <div class="dropdown" style="margin: 10px 20px 0 auto; position: absolute;top:10px;right:20px">
                    <form action="{{ route('admin.delete', $post->id) }}" method="POST">
                        @method("delete")
                        @csrf
                        <button type="submit" class="dropdown-item text-danger" href="/">Delete</button>
                    </form>
        </div>

        <div class="post-head">
            <a href="{{ route('admin.show',$post->user_id) }}">
                <img src="/images/uploads/{{ $post->imageUrl }}" width="100px" class="post-user-image shadow" alt="{{ $post->imageUrl }}">
            </a>
            <div class="post-head-detail ml-4">
                <a href="{{ route('admin.show',$post->user_id) }}"><h4>{{ $post->username }}</h4></a>
                <small class="text-muted">{{ $post->created_at }}</small>
            </div>
        </div>
    </div>
    <div class="post-status">
        <p>{{ $post->status }}</p>
    </div>

    @if ($post->imageUrl !== null)
    <div class="post-image">
        <img src="/pictures/3.60" width="100%" alt="{{ $post->imageUrl }}">
    </div>
    @endif
</div>

@endsection