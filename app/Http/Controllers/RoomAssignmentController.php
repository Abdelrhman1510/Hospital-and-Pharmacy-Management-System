<?php
namespace App\Http\Controllers;

use App\Models\RoomAssignment;
use App\Models\Room;
use App\Models\Patient;
use Illuminate\Http\Request;

class RoomAssignmentController extends Controller
{
    public function index()
    {
        $assignments = RoomAssignment::with('room', 'patient')->get();
        return view('room_assignments.index', compact('assignments'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'Available')->get();
        $patients = Patient::all();
        return view('room_assignments.create', compact('rooms', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        RoomAssignment::create([
            'room_id' => $request->room_id,
            'patient_id' => $request->patient_id,
            'assigned_at' => now(),
        ]);

        $room = Room::find($request->room_id);
        $room->update(['status' => 'Occupied']);

        return redirect()->route('room-assignments.index')->with('success', 'Room assigned successfully.');
    }

    public function destroy(RoomAssignment $roomAssignment)
    {
        $roomAssignment->room->update(['status' => 'Available']);
        $roomAssignment->delete();

        return redirect()->route('room-assignments.index')->with('success', 'Room assignment deleted successfully.');
    }
}
