@extends('Dashboard.layouts.master')

@section('title', 'Edit Room')

@section('content')
    <div class="container">
        <h2 class="mt-3">Edit Room</h2>
        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="ICU" {{ $room->type == 'ICU' ? 'selected' : '' }}>ICU</option>
                    <option value="General Ward" {{ $room->type == 'General Ward' ? 'selected' : '' }}>General Ward</option>
                    <option value="Private Room" {{ $room->type == 'Private Room' ? 'selected' : '' }}>Private Room</option>
                </select>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $room->capacity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
