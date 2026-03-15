<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CoffeeSupply</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit CoffeeSupply</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('CoffeeSupplys.update', $coffeeSupply->uuid) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="coffee_id" class="form-label" disabled>Coffee ID</label>
                                <input type="text" class="form-control" 
                                       id="coffee_id" name="coffee_id" value="{{ old('coffee_id', $coffeeSupply->coffee_id) }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $coffeeSupply->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category') is-invalid @enderror" 
                                        id="category" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Arabica" {{ old('category', $coffeeSupply->category) == 'Arabica' ? 'selected' : '' }}>Arabica</option>
                                    <option value="Robusta" {{ old('category', $coffeeSupply->category) == 'Robusta' ? 'selected' : '' }}>Robusta</option>
                                    <option value="Liberica" {{ old('category', $coffeeSupply->category) == 'Liberica' ? 'selected' : '' }}>Liberica</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror" 
                                       id="quantity" name="quantity" value="{{ old('quantity', $coffeeSupply->quantity) }}" required>
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="unit_of_measure" class="form-label">Unit of Measure</label>
                                <select class="form-select @error('unit_of_measure') is-invalid @enderror" 
                                        id="unit_of_measure" name="unit_of_measure" required>
                                    <option value="">Select Unit of Measure</option>
                                    <option value="kg" {{ old('unit_of_measure', $coffeeSupply->unit_of_measure) == 'kg' ? 'selected' : '' }}>kg</option>
                                    <option value="lbs" {{ old('unit_of_measure', $coffeeSupply->unit_of_measure) == 'lbs' ? 'selected' : '' }}>lbs</option>
                                    <option value="oz" {{ old('unit_of_measure', $coffeeSupply->unit_of_measure) == 'oz' ? 'selected' : '' }}>oz</option>
                                </select>
                                @error('unit_of_measure')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price', $coffeeSupply->price) }}" step="0.01" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('CoffeeSupplys.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Coffee Supply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
