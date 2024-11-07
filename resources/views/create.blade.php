<!-- resources/views/inventory/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Inventory Item</title>
</head>
<body>
    <h1>Add New Inventory Item</h1>

    <!-- Display validation errors if any -->
    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="{{ old('product_name') }}" required><br>

        <label for="category">Category:</label>
        <input type="text" name="category" value="{{ old('category') }}" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}" required><br>

        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ old('price') }}" required><br>

        <button type="submit">Add Item</button>
    </form>

    <a href="{{ route('inventories.index') }}">Back to Inventory List</a>
</body>
</html>
