@extends('layouts.app_admin')

@section('content')
    <div class="col-md-12 col-lg-1x2">
        <div class="container">
            <a href="{{ url('admin/categories/list') }}"><button class="btn btn-primary">List category</button></a>
            <div>
                <h2>Add Category</h2>
                <form action="{{ url('/admin/categories/edit/'.$category->id) }}" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                      <label for="id">Id:</label>
                      <input type="text" class="form-control" id="id" value="{{ $category->id }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="admin">Created by</label>:</label>
                      <input type="text" class="form-control" id="admin" value="{{ $category->admin->name }}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="nameCategory">Name cateogry:</label>
                      <input type="text" class="form-control" id="mameCategory" name="name" value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
