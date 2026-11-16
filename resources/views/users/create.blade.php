@extends('layouts.cafe')

@section('title', 'Create User')

@section('content')
    <h1>Create User</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}">

        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}">

        <div class="actions">
            <button type="submit" class="btn btn-pink">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-gray">Cancel</a>
        </div>
    </form>
@endsection