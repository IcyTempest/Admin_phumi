@section('title','user detail')
@extends('layouts.layout')
@section('detail')
            <!-- Content -->
            <div class="container-fluid">
                <div class="row mt-4">   
                    <div class="col-lg-12">
                        <h1>Username {{ $data->username }}</h1>
                        <p>Email: {{ $data->email }}</p>
                        <p>Bio: {{ $data->bio }}</p>
                        <p>Address: {{ $data->address }}</p>
                        <p>Live In: {{ $data->liveIn }}</p>
                        <p>From: {{ $data->from }}</p>
                        <p>Work At: {{ $data->workAt }}</p>
                        <p>Studied At: {{ $data->studiedAt }}</p>
                        <p>Posts: {{ $post_count }}</p>
                        <p>Shares: {{ $share_count }}</p>
                        <p>Followers: {{ $follower_count }}</p>
                        <p>Following: {{ $follow_count }}</p>
                        <p>Blocking: {{ $block_count }}</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card m-4">
                            <div class="card-body">
                                <legend>User Settings</legend>
                                <div class="list-group">
                                    <a href="http://phumi.herokuapp.com/user/{{ $data->id }}" class="list-group-item list-group-item-action">
                                        User Profile
                                    </a>
                                    <a href="http://phumi.herokuapp.com/user/{{ $data->id }}/posts" class="list-group-item list-group-item-action">
                                        All posts
                                    </a>
                                    <a href="http://phumi.herokuapp.com/user/{{ $data->id }}/shares" class="list-group-item list-group-item-action">
                                        All shares
                                    </a>
                                    <a href="http://phumi.herokuapp.com/user/{{ $data->id }}/following" class="list-group-item list-group-item-action">
                                        Users following
                                    </a>
                                    <a href="http://phumi.herokuapp.com/user/{{ $data->id }}/followers" class="list-group-item list-group-item-action">
                                        Users followers
                                    </a>
                                    <small class="text-muted mt-4">People got scam by this user? </small>
                                    <form action="{{ route('admin.delete_account',['id'=>$data->id]) }}" method="get">
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">Delete User</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card m-4">
                            <div class="card-body">
                                <form action="{{ route('admin.change_password',['id' => $data->id]) }}" method="post">
                                    <div class="form-group">
                                        @csrf
                                        <legend>User request to change password</legend>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="" aria-describedby="helpPassword">
                                        <small id="helpPassword" class="text-muted">
                                            After change the password for user,
                                            The old password won't work anymore!
                                        </small>
                                    </div>
                                    <button type="submit" class="btn btn-md btn-outline-primary w-100 mt-4" onclick="closeAlert('successAlert')">Save
                                        Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection