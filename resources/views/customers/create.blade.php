@extends('layouts.cafe')

@section('title', 'Create Customer')

@section('content')
    <h1>Create Customer</h1>

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf

        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}">

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}">

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}">

        <div class="actions">
            <button type="submit" class="btn btn-pink">Save</button>
            <a href="{{ route('customers.index') }}" class="btn btn-gray">Cancel</a>
        </div>
    </form>
@endsection