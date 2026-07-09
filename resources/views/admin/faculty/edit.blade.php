@extends('admin.layout')

@section('title', 'Edit Faculty')

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

    <form action="{{ route('admin.faculty.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Teacher ID</label>
            <input type="text" name="teacher_id" value="{{ old('teacher_id', $faculty->teacher_id) }}" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ old('email', $faculty->email) }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Password (Leave blank to keep current)</label>
            <input type="password" name="password" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $faculty->name) }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" value="{{ old('designation', $faculty->designation) }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Department</label>
            <input type="text" name="department" value="{{ old('department', $faculty->department) }}" required class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Research Interest</label>
            <textarea name="research_interest" rows="3" class="form-input">{{ old('research_interest', $faculty->research_interest) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Published Papers</label>
            <textarea name="published_papers" rows="3" class="form-input">{{ old('published_papers', $faculty->published_papers) }}</textarea>
        </div>

        <div class="form-group-last">
            <label class="form-label">Image Upload (Optional)</label>
            @if($faculty->image)
                <div>
                    <img src="{{ $faculty->image }}" alt="Current Image" class="current-image">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Update Faculty
            </button>
            <a href="{{ route('admin.faculty.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

@endsection
