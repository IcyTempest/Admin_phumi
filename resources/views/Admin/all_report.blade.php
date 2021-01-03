@extends('layouts.layout')
@section('title','Report')
@section('report')
<div class="container-fluid">
    <div class="list-group mt-4">
    @foreach($reports as $report)
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex flex-row">
                <img height="100vh" src="http://phumi.herokuapp.com/images/logo.jpeg" alt="">
                <p class="d-flex flex-column p-2">
                    <span class="display-6">{{ $report->username }}</span>
                    <span>
                        {{ $report->reason }}
                    </span>
                </p>
            </div>
            <form action="{{ route('admin.delete_post', $report->post_id) }}" method='POST'>
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm float-end">Delete Post</button>
            </form>
        </a>


    </div>
    @endforeach
</div>
@endsection