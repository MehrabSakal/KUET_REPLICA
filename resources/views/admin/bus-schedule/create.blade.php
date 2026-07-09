@extends('admin.layout')

@section('title', 'Add Bus Schedule')

@section('content')
<div class="form-card">
    <form action="{{ route('admin.bus-schedule.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="shift">Shift</label>
            <select name="shift" id="shift" class="form-input" required>
                <option value="morning">Morning</option>
                <option value="afternoon">Afternoon</option>
                <option value="night">Night</option>
            </select>
            @error('shift') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="route">Route</label>
            <input type="text" name="route" id="route" class="form-input" required placeholder="e.g. KUET to Khulna City">
            @error('route') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="departure_time">Departure Time</label>
            <input type="text" name="departure_time" id="departure_time" class="form-input" required placeholder="e.g. 08:00 AM">
            @error('departure_time') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group-last">
            <label class="form-label" for="bus_name">Bus Name/Number</label>
            <input type="text" name="bus_name" id="bus_name" class="form-input" required placeholder="e.g. Phalguni">
            @error('bus_name') <p class="form-hint" style="color:#ef4444;">{{ $message }}</p> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Save Schedule
            </button>
            <a href="{{ route('admin.bus-schedule.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
