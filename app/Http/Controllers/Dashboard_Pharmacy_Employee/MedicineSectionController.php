<?php
namespace App\Http\Controllers\Dashboard_Pharmacy_Employee;

use App\Http\Controllers\Controller;
use App\Models\MedicineSection;
use Illuminate\Http\Request;

class MedicineSectionController extends Controller
{
    public function index()
    {
        $sections = MedicineSection::all();
        return view('Dashboard.dashboard_PharmacyEmployee.medicine-sections.index', compact('sections'));
    }

    public function create()
    {
        return view('Dashboard.dashboard_PharmacyEmployee.medicine-sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        MedicineSection::create($request->all());
        return redirect()->route('medicine-sections.index')->with('success', 'Section created successfully.');
    }

    public function edit(MedicineSection $medicineSection)
    {
        return view('Dashboard.dashboard_PharmacyEmployee.medicine-sections.edit', compact('medicineSection'));
    }

    public function update(Request $request, MedicineSection $medicineSection)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $medicineSection->update($request->all());
        return redirect()->route('medicine-sections.index')->with('success', 'Section updated successfully.');
    }

    public function destroy(MedicineSection $medicineSection)
    {
        $medicineSection->delete();
        return redirect()->route('medicine-sections.index')->with('success', 'Section deleted successfully.');
    }
}
