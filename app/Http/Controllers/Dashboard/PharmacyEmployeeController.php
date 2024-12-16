<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PharmacyEmployeeLoginRequest;
use App\Interfaces\RayEmployee\RayEmployeeRepositoryInterface;
use Illuminate\Http\Request;

use App\Interfaces\PharmacyEmployee\PharmacyEmployeeRepositoryInterface;
use App\Models\PharmacyEmployee;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class PharmacyEmployeeController extends Controller
{

    public function index()
    {
        $pharmacy_employees = PharmacyEmployee::all();
        return view('Dashboard.pharmacy_employee.index',compact('pharmacy_employees'));
    }

    public function store( Request $request)
    {
        try {

            $pharmacy_employee = new PharmacyEmployee();
            $pharmacy_employee->name = $request->name;
            $pharmacy_employee->email = $request->email;
            $pharmacy_employee->password = Hash::make($request->password);
            $pharmacy_employee->save();
            session()->flash('add');
            return back();

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        else{
            $input = Arr::except($input, ['password']);
        }

        $ray_employee = PharmacyEmployee::find($id);
        $ray_employee->update($input);

        session()->flash('edit');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            PharmacyEmployee::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

