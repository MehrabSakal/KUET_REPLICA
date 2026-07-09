@extends('admin.layout')

@section('title', 'Add New Faculty')

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

    <form action="{{ route('admin.faculty.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Teacher ID</label>
            <input type="text" name="teacher_id" value="{{ old('teacher_id') }}" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" value="{{ old('designation') }}" placeholder="e.g. Professor, Assistant Professor" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Department</label>
            <input type="text" name="department" value="{{ old('department') }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Research Interest</label>
            <textarea name="research_interest" rows="3" class="form-input">{{ old('research_interest') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Published Papers</label>
            <textarea name="published_papers" rows="3" class="form-input">{{ old('published_papers') }}</textarea>
        </div>

        <div class="form-group-last">
            <label class="form-label">Image Upload (Optional)</label>
            <input type="file" name="image" accept="image/*" class="form-input">
            <p class="form-hint">Upload a photo of the teacher.</p>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Save Faculty
            </button>
            <a href="{{ route('admin.faculty.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

@endsection
