@extends('layouts.app_admin')

@section('content')
    <div class="col-md-12 col-lg-12">
        <div class="container">
            <div>
                <h2>List Comment</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Post</th>
                            <th scope="col">Content</th>
                            <th scope="col">Created by</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                        <tr>
                            <th scope="row">{{ $comment->id }}</th>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="#" onclick="event.preventDefault();
                                document.getElementById('change_status-form{{ $comment->id }}').submit();">@if($comment->is_active == true) Hidden commnet @else Show comment @endif</a>
                                <form action="{{ url('/admin/comments/update/'.$comment->id) }}" method="post" id="change_status-form{{ $comment->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
