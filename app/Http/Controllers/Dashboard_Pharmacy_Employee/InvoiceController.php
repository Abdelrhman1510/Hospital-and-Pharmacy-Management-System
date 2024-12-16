<?php

namespace App\Http\Controllers\Dashboard_Pharmacy_Employee;

use App\Models\MedicineInvoice;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function create()
    {
        // Get all medicines for selection
        $medicines = Medicine::all();
        return view('Dashboard.dashboard_PharmacyEmployee.invoices.create', compact('medicines'));
    }
    public function store(Request $request)
    {
        // Validate the medicines input
        $validated = $request->validate([
            'medicines' => 'required|array|min:1',
            'medicines.*' => 'exists:medicines,id',
            'quantities' => 'required|array',
            'quantities.*' => 'nullable|integer|min:1',
        ]);

        // Generate a unique invoice number
        $invoiceNumber = 'INV-' . now()->format('Y-m-d') . '-' . str_pad(MedicineInvoice::whereDate('created_at', today())->count() + 1, 3, '0', STR_PAD_LEFT);

        // Create a new invoice
        $invoice = MedicineInvoice::create([
            'invoice_number' => $invoiceNumber,
            'total' => 0, // Will be updated later
        ]);

        // Initialize total amount
        $totalAmount = 0;

        // Iterate through the selected medicines
        foreach ($request->medicines as $medicineId) {
            // Get the corresponding quantity, default to 1 if not set
            $quantity = $request->quantities[$medicineId] ?? 1;

            // Find the medicine
            $medicine = Medicine::findOrFail($medicineId);

            // Check if sufficient stock is available
            if ($medicine->stock < $quantity) {
                return redirect()->back()->withErrors([
                    "The medicine {$medicine->name} has insufficient stock. Available stock: {$medicine->stock}."
                ]);
            }

            // Calculate the total price for this medicine
            $total = $medicine->price * $quantity;

            // Attach the medicine to the invoice with quantity and total
            $invoice->medicines()->attach($medicine->id, [
                'quantity' => $quantity,
                'total' => $total,
            ]);

            // Deduct the stock
            $medicine->decrement('stock', $quantity);

            // Add to the total amount for the invoice
            $totalAmount += $total;
        }

        // Update the total price for the invoice
        $invoice->update(['total' => $totalAmount]);

        // Redirect to the invoice view page
        return redirect()->route('medicineinvoices.show', $invoice->id)->with('success', 'Invoice created successfully!');
    }





    // Show the invoice
    public function show($id)
    {
        $invoice = MedicineInvoice::with('medicines')->findOrFail($id);
        return view('Dashboard.dashboard_PharmacyEmployee.invoices.show', compact('invoice'));
    }

    // List all invoices
    public function index(Request $request)
    {
        // Get the search term from the request
        $search = $request->input('search');

        // Retrieve invoices, filtered by the search term (if provided)
        $invoices = MedicineInvoice::when($search, function ($query, $search) {
            $query->where('invoice_number', 'like', '%' . $search . '%');
        })->orderByDesc('created_at')->get();

        return view('Dashboard.dashboard_PharmacyEmployee.invoices.index', compact('invoices', 'search'));
    }


    // Edit the invoice (optional in your case)
    public function edit($id)
    {
        $invoice = MedicineInvoice::findOrFail($id);
        return view('Dashboard.dashboard_PharmacyEmployee.invoices.edit', compact('invoice'));
    }

    // Update the invoice (optional in your case)
    public function update(Request $request, $id)
    {
        $invoice = MedicineInvoice::findOrFail($id);
        $invoice->update($request->all());
        return redirect()->route('medicineinvoices.show', $invoice->id);
    }

    // Delete the invoice
    public function destroy($id)
    {
        // Find the invoice with its associated medicines
        $invoice = MedicineInvoice::with('medicines')->findOrFail($id);

        // Loop through the medicines attached to the invoice
        foreach ($invoice->medicines as $medicine) {
            // Increment the stock by the quantity in the invoice
            $quantity = $medicine->pivot->quantity; // Access the pivot table to get the quantity
            $medicine->increment('stock', $quantity);
        }

        // Delete the invoice
        $invoice->delete();

        // Redirect back to the invoice list with a success message
        return redirect()->route('medicineinvoices.index')->with('success', 'Invoice deleted and medicines returned to stock successfully!');
    }

    public function raw($id)
    {
        $invoice = MedicineInvoice::with('medicines')->findOrFail($id);

        return view('Dashboard.dashboard_PharmacyEmployee.invoices.raw', compact('invoice'));
    }
}
