@extends('layouts.app_admin')

@section('content')
    <div class="col-md-12 col-lg-12">
        <div class="container">
            <div>
                <h2>List Post</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Category</th>
                            <th scope="col">Created by</th>
                            <th scope="col">Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->admin->name }}</td>
                            <td>{{ $post->created_at->format('d-m-Y') }}</td>
                            <form action="{{ route('delete',[$post['id']] ) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{  $post['id'] }}">
                                <td><input onclick="return confirm('Are you sure you want to delete this user?');" type="submit" value="Delete" class="btn btn-danger"></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
