@extends('admin.layout')

@section('title', 'Edit Lost & Found Item')

@section('content')

<style>
    .edit-container {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 24px;
        max-width: 800px;
        margin: 0 auto;
    }
    .edit-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .edit-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }
    .back-link {
        color: #3498db;
        text-decoration: none;
        font-size: 14px;
    }
    .back-link:hover {
        text-decoration: underline;
    }
    .error-alert {
        background-color: #fee2e2;
        border-left: 4px solid #ef4444;
        color: #b91c1c;
        padding: 16px;
        margin-bottom: 24px;
        border-radius: 4px;
    }
    .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr 1fr;
        }
        .full-width {
            grid-column: span 2;
        }
    }
    .form-group {
        display: flex;
        flex-direction: column;
    }
    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
    }
    .form-input, .form-select, .form-textarea {
        width: 100%;
        padding: 10px 16px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.2s;
    }
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: #3498db;
    }
    .form-textarea {
        resize: vertical;
    }
    .form-actions {
        margin-top: 24px;
        padding-top: 16px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: flex-end;
    }
    .btn-submit {
        padding: 10px 24px;
        background-color: #3498db;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .btn-submit:hover {
        background-color: #2980b9;
    }
    .current-image-preview {
        margin-top: 10px;
    }
    .current-image-preview span {
        font-size: 12px;
        color: #777;
        display: block;
        margin-bottom: 4px;
    }
    .current-image-preview img {
        height: 80px;
        width: 80px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ddd;
    }
    .status-resolved {
        color: #16a34a;
    }
    .status-active {
        color: #d97706;
    }
</style>

<div class="edit-container">
    
    <div class="edit-header">
        <h2 class="edit-title">Edit Post</h2>
        <a href="{{ route('admin.lost-and-found.index') }}" class="back-link">&larr; Back to List</a>
    </div>

    @if ($errors->any())
        <div class="error-alert">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.lost-and-found.update', $lost_and_found->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-grid">
            
            <div class="form-group">
                <label class="form-label">Post Type</label>
                <select name="type" class="form-select">
                    <option value="lost" {{ old('type', $lost_and_found->type) == 'lost' ? 'selected' : '' }}>Lost</option>
                    <option value="found" {{ old('type', $lost_and_found->type) == 'found' ? 'selected' : '' }}>Found</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-select {{ old('status', $lost_and_found->status) == 'resolved' ? 'status-resolved' : 'status-active' }}" style="font-weight: bold;">
                    <option value="active" {{ old('status', $lost_and_found->status) == 'active' ? 'selected' : '' }}>Active (Public)</option>
                    <option value="resolved" {{ old('status', $lost_and_found->status) == 'resolved' ? 'selected' : '' }}>Resolved (Hidden from feed)</option>
                </select>
            </div>

            <div class="form-group full-width">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title', $lost_and_found->title) }}" class="form-input" required>
            </div>

            <div class="form-group full-width">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-textarea" required>{{ old('description', $lost_and_found->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Location</label>
                <input type="text" name="location" value="{{ old('location', $lost_and_found->location) }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Date (Lost/Found)</label>
                <input type="date" name="date" value="{{ old('date', $lost_and_found->date) }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Contact Info</label>
                <input type="text" name="contact_info" value="{{ old('contact_info', $lost_and_found->contact_info) }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Image (Leave blank to keep current)</label>
                <input type="file" name="image" class="form-input" accept="image/*" style="border: none; padding: 0;">
                @if($lost_and_found->image_path)
                    <div class="current-image-preview">
                        <span>Current Image:</span>
                        <img src="{{ asset('storage/' . $lost_and_found->image_path) }}" alt="Current Image">
                    </div>
                @endif
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Update Post</button>
        </div>

    </form>
</div>
@endsection
