@section('title','home')
@extends('layouts.layout')
@section('actived','active')
    @section('home')
            <!-- Content -->
            <div class="container-fluid">
                    @foreach($user as $i)
                    <a href="{{ route('admin.show',['id'=> $i->id]) }}" class="list-group-item list-group-item-action">
                        <span class="display-6">{{ $i->username }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
    @endsection