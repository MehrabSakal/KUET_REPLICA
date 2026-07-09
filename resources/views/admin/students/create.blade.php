@extends('admin.layout')

@section('title', 'Add New Student')

@section('content')

<div class="form-card">
    
    @if($errors->any())
        <div class="error-box">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.students.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Student ID</label>
            <input type="text" name="student_id" value="{{ old('student_id') }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-input">
        </div>

        <div class="form-group-last">
            <label class="form-label">Department</label>
            <input type="text" name="department" value="{{ old('department') }}" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Save Student
            </button>
            <a href="{{ route('admin.students.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

@endsection
