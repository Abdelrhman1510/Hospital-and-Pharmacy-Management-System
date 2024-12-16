@extends('Dashboard.layouts.master')

@section('title', 'Assign Room')

@section('content')
    <div class="container">
        <h2 class="mt-3">Assign Room</h2>
        <form action="{{ route('room-assignments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="room_id">Room</label>
                <select name="room_id" id="room_id" class="form-control">
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->room_number }} - {{ $room->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="patient_id">Patient</label>
                <select name="patient_id" id="patient_id" class="form-control">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
@endsection
