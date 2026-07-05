@extends('layouts.app')

@section('title', 'Report Item - Lost and Found')
@section('page_title', 'Report a Lost or Found Item')

@section('content')
<style>
    .form-container {
        max-width: 768px;
        margin: 40px auto;
        padding: 0 15px;
    }
    .form-card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        overflow: hidden;
        border: 1px solid #eee;
    }
    .form-header {
        background-color: #f9fafb;
        padding: 24px 32px;
        border-bottom: 1px solid #eee;
    }
    .form-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin: 0 0 4px 0;
    }
    .form-subtitle {
        color: #666;
        font-size: 14px;
        margin: 0;
    }
    .form-body {
        padding: 32px;
    }
    .alert-error {
        background-color: #fef2f2;
        border-left: 4px solid #ef4444;
        color: #b91c1c;
        padding: 16px;
        margin-bottom: 24px;
        border-radius: 4px;
    }
    .alert-error ul {
        margin: 0;
        padding-left: 20px;
    }
    .form-group {
        margin-bottom: 24px;
    }
    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
    }
    .type-selection {
        display: flex;
        gap: 16px;
    }
    .radio-label {
        flex: 1;
        cursor: pointer;
    }
    .radio-input {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }
    .radio-card {
        padding: 16px;
        text-align: center;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
        transition: all 0.2s;
    }
    .radio-card:hover {
        background-color: #f9fafb;
    }
    .radio-card span {
        font-weight: bold;
    }
    .radio-input:checked + .radio-card.lost-card {
        border-color: #ef4444;
        background-color: #fef2f2;
    }
    .radio-input:checked + .radio-card.lost-card span {
        color: #b91c1c;
    }
    .radio-input:checked + .radio-card.found-card {
        border-color: #22c55e;
        background-color: #f0fdf4;
    }
    .radio-input:checked + .radio-card.found-card span {
        color: #15803d;
    }
    .form-input, .form-textarea, .form-file {
        width: 100%;
        padding: 12px 16px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 16px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-input:focus, .form-textarea:focus {
        outline: none;
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }
    .form-textarea {
        resize: vertical;
    }
    .grid-2-cols {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) {
        .grid-2-cols {
            grid-template-columns: 1fr 1fr;
        }
    }
    .file-upload-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 24px;
        border: 2px dashed #d1d5db;
        border-radius: 8px;
        text-align: center;
        background-color: #f9fafb;
        transition: background-color 0.2s;
    }
    .file-upload-box:hover {
        background-color: #f3f4f6;
    }
    .file-upload-box svg {
        width: 48px;
        height: 48px;
        color: #9ca3af;
        margin-bottom: 8px;
    }
    .file-upload-text {
        font-size: 14px;
        color: #4b5563;
        margin-bottom: 4px;
    }
    .file-upload-subtext {
        font-size: 12px;
        color: #6b7280;
    }
    .upload-link {
        color: #ef4444;
        font-weight: 500;
        cursor: pointer;
    }
    .upload-link:hover {
        color: #dc2626;
    }
    .form-actions {
        padding-top: 24px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: flex-end;
        gap: 16px;
    }
    .btn-cancel {
        padding: 12px 24px;
        background-color: #f3f4f6;
        color: #374151;
        font-weight: 600;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.2s;
    }
    .btn-cancel:hover {
        background-color: #e5e7eb;
    }
    .btn-submit {
        padding: 12px 32px;
        background-color: #b91c1c;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .btn-submit:hover {
        background-color: #991b1b;
    }
</style>

<div class="form-container">
    
    <div class="form-card">
        <div class="form-header">
            <h2 class="form-title">Item Details</h2>
            <p class="form-subtitle">Please provide accurate information to help others.</p>
        </div>

        <div class="form-body">
            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lost-and-found.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Did you lose or find this item?</label>
                    <div class="type-selection">
                        <label class="radio-label">
                            <input type="radio" name="type" value="lost" class="radio-input" {{ old('type', 'lost') == 'lost' ? 'checked' : '' }}>
                            <div class="radio-card lost-card">
                                <span style="color: #666;">I Lost It</span>
                            </div>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="type" value="found" class="radio-input" {{ old('type') == 'found' ? 'checked' : '' }}>
                            <div class="radio-card found-card">
                                <span style="color: #666;">I Found It</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="form-label">Item Name / Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="e.g., Black Leather Wallet" class="form-input">
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4" required placeholder="Describe the item (color, brand, any unique marks...)" class="form-textarea">{{ old('description') }}</textarea>
                </div>

                <div class="form-group grid-2-cols">
                    <div>
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" required placeholder="e.g., SWC Cafeteria" class="form-input">
                    </div>
                    <div>
                        <label for="date" class="form-label">Date (Lost/Found)</label>
                        <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" required class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact_info" class="form-label">Your Contact Info</label>
                    <input type="text" name="contact_info" id="contact_info" value="{{ old('contact_info') }}" required placeholder="Phone number or Email or Dept/Roll" class="form-input">
                </div>

                <div class="form-group">
                    <label class="form-label">Image (Optional)</label>
                    <div class="file-upload-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="file-upload-text">
                            <label for="image" class="upload-link">Upload a file</label>
                            <span>or drag and drop</span>
                            <input id="image" name="image" type="file" class="radio-input" accept="image/*">
                        </div>
                        <p class="file-upload-subtext">PNG, JPG, GIF up to 2MB</p>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('lost-and-found.index') }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-submit">Submit Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
