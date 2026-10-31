@extends('layouts.data')

@section('title', 'Customers')

@section('content')
    <div class="page-head">
        <h1>Customers</h1>
        <p>Customer records retrieved through the Customer Eloquent model.</p>
    </div>

    <div class="data-card">
        <div class="data-card-head">
            <h2>Customer Directory</h2>
            <span class="count-badge">{{ $customers->count() }} records</span>
        </div>
        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>
                                <div class="person">
                                    <div class="avatar">{{ strtoupper(substr($customer->full_name, 0, 1)) }}</div>
                                    {{ $customer->full_name }}
                                </div>
                            </td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="empty">No customers found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection