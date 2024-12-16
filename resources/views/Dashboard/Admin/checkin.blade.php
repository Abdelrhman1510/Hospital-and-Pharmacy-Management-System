@extends('Dashboard.layouts.master')

@section('css')
<!-- Owl-carousel css -->
<link href="{{URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Control Room</h2>
    </div>
</div>
<!-- /breadcrumb -->
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Filter Check-ins</h6>
                <form method="GET" action="{{ route('checkin.index') }}" class="d-flex flex-wrap gap-2">
                    <div class="form-group mr-3">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
                    </div>
                    <div class="form-group mr-3">
                        <label for="user_type">User Type</label>
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="">All</option>
                            <option value="doctor" {{ request('user_type') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                            <option value="Ray_employee" {{ request('user_type') == 'Ray_employee' ? 'selected' : '' }}>Ray_employee</option>
                            <option value="Laboratorie_employee	" {{ request('user_type') == 'Laboratorie_employee' ? 'selected' : '' }}>Laboratorie_employee</option>
                            <option value="Pharmacy_employee" {{ request('user_type') == 'Pharmacy_employee' ? 'selected' : '' }}>Pharmacy_employee</option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary align-self-end mb-3">Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row row-sm mt-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Check-ins</h6>
                <table class="table table-striped table-bordered">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>User Type</th>
                            <th>Check-in Time</th>
                            <th>Check-out Time</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checkIns as $index => $checkIn)
                            <tr>
                                <td class="text-center align-middle">{{ $index + 1 + ($checkIns->currentPage() - 1) * $checkIns->perPage() }}</td>
                                <td class="align-middle text-center">{{ $checkIn->user ? $checkIn->user->name : 'Unknown User' }}</td>
                                <td class="align-middle text-center">{{ ucfirst($checkIn->user_type) }}</td>
                                <td class="align-middle text-center">{{ $checkIn->check_in_at ?? 'N/A' }}</td>
                                <td class="align-middle text-center">{{ $checkIn->check_out_at ?? 'N/A' }}</td>
                                <td class="align-middle text-center">
                                    <span class="badge
                                        @if($checkIn->status === 'Completed') badge-success
                                        @elseif($checkIn->status === 'Late') badge-warning
                                        @elseif($checkIn->status === 'Uncompleted') badge-danger
                                        @else badge-secondary @endif">
                                        {{ $checkIn->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No check-ins found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $checkIns->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!--Internal Chart.bundle js -->
<script src="{{URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch the doctor data
        const doctorData = @json(\App\Models\Section::withCount('doctors')->get(['name', 'doctors_count']));

        // Map section names and doctor counts
        const labels = doctorData.map(section => section.name);
        const data = doctorData.map(section => section.doctors_count);

        // Get the chart context
        const ctx = document.getElementById('doctorChart').getContext('2d');

        // Create the bar chart
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Doctors Count',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 0
                        }
                    },
                    y: {
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) { if (value % 1 === 0) { return value; } }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
