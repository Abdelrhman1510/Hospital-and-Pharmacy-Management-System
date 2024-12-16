@extends('Dashboard.layouts.master')

@section('title', 'Room Assignments')

@section('content')
    <div class="container">
        <h2 class="mt-3">Room Assignments</h2>
        <a href="{{ route('room-assignments.create') }}" class="btn btn-primary mb-3">Assign Room</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Room Number</th>
                    <th>Patient Name</th>
                    <th>Assigned At</th>
                    <th>Discharged At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $assignment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $assignment->room->room_number }}</td>
                        <td>{{ $assignment->patient->name }}</td>
                        <td>{{ $assignment->assigned_at }}</td>
                        <td>{{ $assignment->discharged_at ?? 'N/A' }}</td>
                        <td>
                            <form action="{{ route('room-assignments.destroy', $assignment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Discharge</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
