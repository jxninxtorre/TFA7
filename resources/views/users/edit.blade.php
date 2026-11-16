@extends('layouts.cafe')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">

        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}">

        <label for="avatar">Profile Picture (JPG/PNG, max 2MB)</label>
        <img src="{{ $user->avatar_url }}" alt="avatar" class="avatar avatar-lg"><br><br>
        <input type="file" id="avatar" name="avatar" accept="image/png,image/jpeg">

        <div class="actions">
            <button type="submit" class="btn btn-pink">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-gray">Cancel</a>
        </div>
    </form>
@endsection