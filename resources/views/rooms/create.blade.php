@extends('Dashboard.layouts.master')

@section('title', 'Add Room')

@section('content')
    <div class="container">
        <h2 class="mt-3">Add New Room</h2>
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" class="form-control" id="room_number" name="room_number" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="ICU">ICU</option>
                    <option value="General Ward">General Ward</option>
                    <option value="Private Room">Private Room</option>
                </select>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
