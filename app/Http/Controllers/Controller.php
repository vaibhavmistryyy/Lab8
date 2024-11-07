namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Show all inventory items
    public function index()
    {
        $inventories = Inventory::all(); // Get all items from the database
        return view('inventory.index', compact('inventories')); // Pass them to the view
    }

    // Show form to create a new inventory item
    public function create()
    {
        return view('inventory.create'); // Return create view
    }

    // Store a new inventory item
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Create new inventory item
        Inventory::create([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        // Redirect to inventory list with success message
        return redirect('/inventories')->with('success', 'Inventory item added!');
    }

    // Show form to edit an existing inventory item
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id); // Find inventory by ID
        return view('inventory.edit', compact('inventory')); // Pass to edit view
    }

    // Update an inventory item
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Find and update the inventory item
        $inventory = Inventory::findOrFail($id);
        $inventory->update([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        // Redirect to inventory list with success message
        return redirect('/inventories')->with('success', 'Inventory item updated!');
    }

    // Delete an inventory item
    public function destroy($id)
    {
        // Find and delete the inventory item
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        // Redirect to inventory list with success message
        return redirect('/inventories')->with('success', 'Inventory item deleted!');
    }
}
