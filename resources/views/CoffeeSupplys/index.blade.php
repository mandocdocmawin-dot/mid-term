@extends('layouts.app')

@section('title', 'Coffee Shop')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col">
            <h1>Coffee Shop</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('CoffeeSupplys.create') }}" class="btn btn-primary">Add New Coffee Supply</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Coffee ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit of Measure</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coffeeSupplies as $coffeeSupply)
                        <tr>
                            <td>{{ $coffeeSupply->coffee_id }}</td>
                            <td>{{ $coffeeSupply->name }}</td>
                            <td>{{ $coffeeSupply->category }}</td>
                            <td>{{ $coffeeSupply->quantity }}</td>
                            <td>{{ $coffeeSupply->unit_of_measure }}</td>
                            <td>{{ $coffeeSupply->price }}</td>
                            <td>
                                <a href="{{ route('CoffeeSupplys.show', $coffeeSupply->uuid) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('CoffeeSupplys.edit', $coffeeSupply->uuid) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('CoffeeSupplys.destroy', $coffeeSupply->uuid) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No coffee supplies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center mt-3">
                {{ $coffeeSupplies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection