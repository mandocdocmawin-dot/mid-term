@extends('layouts.app')

@section('title', 'Coffee Supply Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Coffee Supply Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Coffee ID</th>
                            <td>{{ $coffeeSupply->coffee_id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $coffeeSupply->name }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $coffeeSupply->category }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $coffeeSupply->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Unit of Measure</th>
                            <td>{{ $coffeeSupply->unit_of_measure }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $coffeeSupply->price }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $coffeeSupply->updated_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('CoffeeSupplys.index') }}" class="btn btn-secondary">Back to List</a>
                        <div>
                            <a href="{{ route('CoffeeSupplys.edit', $coffeeSupply->uuid) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('CoffeeSupplys.destroy', $coffeeSupply->uuid) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this coffee supply?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection