@extends('layouts.app_admin')

@section('content')
    <div class="col-md-12 col-lg-12">
        <div class="container">
            <div>
                <h2>List User</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">PhoneNumber</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Active</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->dateOfBirth }}</td>
                            <td>{{ $user->phoneNumber }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if($user->role == 1) User @else Admin @endif</td>
                            <td>@if($user->is_active == false) Locked @else Unlocked @endif</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="#" onclick="event.preventDefault();
                                document.getElementById('change_active-form{{ $user->id }}').submit();">@if($user->is_active == true) Lock @else Unlock @endif</a>
                                <form action="{{ url('/admin/users/update/'.$user->id) }}" method="post" id="change_active-form{{ $user->id }}">@csrf</form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
