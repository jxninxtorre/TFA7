@extends('layouts.cafe')

@section('title', 'Edit Customer')

@section('content')
    <h1>Edit Customer</h1>

    <form method="POST" action="{{ route('customers.update', $customer) }}">
        @csrf
        @method('PUT')

        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name) }}">

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email', $customer->email) }}">

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}">

        <div class="actions">
            <button type="submit" class="btn btn-pink">Update</button>
            <a href="{{ route('customers.index') }}" class="btn btn-gray">Cancel</a>
        </div>
    </form>
@endsection