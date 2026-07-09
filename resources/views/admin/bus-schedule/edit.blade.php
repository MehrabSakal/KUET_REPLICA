@extends('admin.layout')

@section('title', 'Edit Bus Schedule')

@section('content')
<div class="form-card">
    <form action="{{ route('admin.bus-schedule.update', $busSchedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="shift">Shift</label>
            <select name="shift" id="shift" class="form-input" required>
                <option value="morning" {{ $busSchedule->shift == 'morning' ? 'selected' : '' }}>Morning</option>
                <option value="afternoon" {{ $busSchedule->shift == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                <option value="night" {{ $busSchedule->shift == 'night' ? 'selected' : '' }}>Night</option>
            </select>
            @error('shift') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="route">Route</label>
            <input type="text" name="route" id="route" value="{{ old('route', $busSchedule->route) }}" class="form-input" required>
            @error('route') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="departure_time">Departure Time</label>
            <input type="text" name="departure_time" id="departure_time" value="{{ old('departure_time', $busSchedule->departure_time) }}" class="form-input" required>
            @error('departure_time') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group-last">
            <label class="form-label" for="bus_name">Bus Name/Number</label>
            <input type="text" name="bus_name" id="bus_name" value="{{ old('bus_name', $busSchedule->bus_name) }}" class="form-input" required>
            @error('bus_name') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Update Schedule
            </button>
            <a href="{{ route('admin.bus-schedule.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
