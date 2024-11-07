<!-- resources/views/inventory/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
</head>
<body>
    <h1>Inventory List</h1>

    <!-- Display success message if any -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('inventories.create') }}">Add New Inventory Item</a>

    <table border="1">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->product_name }}</td>
                    <td>{{ $inventory->category }}</td>
                    <td>{{ $inventory->quantity }}</td>
                    <td>${{ $inventory->price }}</td>
                    <td>
                        <a href="{{ route('inventories.edit', $inventory->id) }}">Edit</a>
                        <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
