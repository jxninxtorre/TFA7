@extends('layouts.data')

@section('title', 'Users')

@section('content')
    <div class="page-head">
        <h1>Users</h1>
        <p>User accounts retrieved through the User Eloquent model.</p>
    </div>

    <div class="data-card">
        <div class="data-card-head">
            <h2>User Accounts</h2>
            <span class="count-badge">{{ $users->count() }} records</span>
        </div>
        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <div class="person">
                                    <div class="avatar">{{ strtoupper(substr($user->full_name, 0, 1)) }}</div>
                                    {{ $user->full_name }}
                                </div>
                            </td>
                            <td><span class="tag">{{ $user->username }}</span></td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="empty">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection