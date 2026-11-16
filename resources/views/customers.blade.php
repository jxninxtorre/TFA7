@extends('layouts.cafe')

@section('title', 'Customers')

@section('content')
    <div class="top-bar">
        <h1>Customers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-pink">+ Add Customer</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td><a href="{{ route('customers.edit', $customer) }}" class="btn">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection