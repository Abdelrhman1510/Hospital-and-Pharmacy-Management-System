<?php
namespace App\Http\Controllers\Dashboard_Pharmacy_Employee;
use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\MedicineSection;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
        $query = Medicine::query();

        if ($request->medicine_section_id) {
            $query->where('medicine_section_id', $request->medicine_section_id);
        }
        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->stock) {
            if ($request->stock === 'in_stock') {
                $query->where('stock', '>', 0); // Assuming stock column tracks quantity
            } elseif ($request->stock === 'out_of_stock') {
                $query->where('stock', '<=', 0);
            }
        }

        $medicines = $query->with('section')->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'table' => view('Dashboard.dashboard_PharmacyEmployee.medicines.table', compact('medicines'))->render(),
                'pagination' => $medicines->links()->render()
            ]);
        }

        $sections = MedicineSection::all();
        return view('Dashboard.dashboard_PharmacyEmployee.medicines.index', compact('medicines', 'sections'));
    }


    public function create()
    {
        $sections = MedicineSection::all();
        return view('Dashboard.dashboard_PharmacyEmployee.medicines.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:medicine_sections,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['medicine_section_id'] = $data['section_id'];
        unset($data['section_id']);

        Medicine::create($data);

        return redirect()->route('medicines.index')->with('success', 'Medicine created successfully.');
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $sections = MedicineSection::all(); // Get all sections
        return view('Dashboard.dashboard_PharmacyEmployee.medicines.edit', compact('medicine', 'sections'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'section_id' => 'required|exists:medicine_sections,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);
        $data = $request->all();
        $data['medicine_section_id'] = $data['section_id'];
        unset($data['section_id']);

        $medicine->update($data);
        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
