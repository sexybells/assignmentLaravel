@extends('layouts.app_admin')

@section('content')
    <div class="col-md-12 col-lg-12">
        <div class="container">
            <a href="{{ url('admin/categories/add') }}"><button class="btn btn-primary">Add category</button></a>
            <div>
                <h2>List Category</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created by</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->admin->name }}</td>
                            <td>{{ $category->created_at->format('d-m-Y') }}</td>
                            <td><a href="{{ url('/admin/categories/edit/'.$category->id) }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
