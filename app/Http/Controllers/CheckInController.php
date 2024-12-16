<?php
namespace App\Http\Controllers;

use App\Models\CheckIn;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckInController extends Controller
{
    public function index(Request $request)
    {
        $query = CheckIn::latest();

        // Filter by name
        if ($request->has('name') && $request->name) {
            $query->where(function ($q) use ($request) {
                $q->when($request->user_type == 'doctor', function ($query) use ($request) {
                    $query->whereHas('doctor', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', '%' . $request->name . '%');
                    });
                });

                $q->when($request->user_type == 'patient', function ($query) use ($request) {
                    $query->whereHas('patient', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', '%' . $request->name . '%');
                    });
                });

                $q->when($request->user_type == 'pharmacy_employee', function ($query) use ($request) {
                    $query->whereHas('pharmacyEmployee', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', '%' . $request->name . '%');
                    });
                });

                $q->when($request->user_type == 'laboratorie_employee', function ($query) use ($request) {
                    $query->whereHas('laboratorieEmployee', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', '%' . $request->name . '%');
                    });
                });

                $q->when($request->user_type == 'ray_employee', function ($query) use ($request) {
                    $query->whereHas('rayEmployee', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', '%' . $request->name . '%');
                    });
                });
            });
        }

        // Filter by user_type
        if ($request->has('user_type') && $request->user_type) {
            $query->where('user_type', $request->user_type);
        }

        // Filter by date
        if ($request->has('date') && $request->date) {
            $query->whereDate('check_in_at', $request->date);
        }

        // Add computed status
        $checkIns = $query->paginate(10)->through(function ($checkIn) {
            $checkIn->status = $this->calculateStatus($checkIn);
            return $checkIn;
        });

        return view('Dashboard.Admin.checkin', compact('checkIns'));
    }

    private function calculateStatus($checkIn)
    {
        $checkInTime = $checkIn->check_in_at ? Carbon::parse($checkIn->check_in_at) : null;
        $checkOutTime = $checkIn->check_out_at ? Carbon::parse($checkIn->check_out_at) : null;

        if (!$checkInTime) {
            return 'Unknown';
        }

        $lateThreshold = Carbon::parse($checkInTime->toDateString() . ' 09:15:00');
        $isLate = $checkInTime->greaterThan($lateThreshold);

        if (!$checkOutTime) {
            return $isLate ? 'Late' : 'Uncompleted';
        }

        $workDuration = $checkInTime->diffInHours($checkOutTime);
        if ($workDuration >= 8) {
            return $isLate ? 'Late' : 'Completed';
        }

        return 'Uncompleted';
    }
}
