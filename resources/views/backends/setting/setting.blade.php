@extends('backends.layout')

@section('backend_content')
<style>
    .settings-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        min-height: 100vh;
    }

    .page-header h1 {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
    }

    .alert-success {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 12px 20px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .settings-card {
        background: white;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 25px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 20px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #007bff;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-weight: 500;
        color: #555;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .logo-preview {
        display: inline-block;
        padding: 10px;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .logo-preview img {
        height: 60px;
        object-fit: contain;
    }

    .cv-link {
        display: inline-block;
        color: #007bff;
        text-decoration: none;
        margin-bottom: 10px;
    }

    .cv-link:hover {
        text-decoration: underline;
    }

    .file-input {
        display: block;
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .file-input:focus {
        outline: none;
        border-color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .social-form {
        background: #f9f9f9;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .social-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 2fr auto;
        gap: 10px;
    }

    .social-input {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .social-input:focus {
        outline: none;
        border-color: #007bff;
    }

    .btn-add {
        background-color: #28a745;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-add:hover {
        background-color: #218838;
    }

    .social-link-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f9f9f9;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .social-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .social-icon {
        font-size: 24px;
        color: #555;
        width: 40px;
        text-align: center;
    }

    .social-details h4 {
        font-weight: 600;
        color: #333;
        margin: 0 0 4px 0;
        font-size: 15px;
    }

    .social-url {
        color: #666;
        font-size: 13px;
        text-decoration: none;
    }

    .social-url:hover {
        color: #007bff;
        text-decoration: underline;
    }

    .social-actions {
        display: flex;
        gap: 8px;
    }

    .btn-toggle {
        padding: 6px 14px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
        color: white;
    }

    .btn-toggle.active {
        background-color: #28a745;
    }

    .btn-toggle.inactive {
        background-color: #6c757d;
    }

    .btn-toggle:hover {
        opacity: 0.9;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        padding: 6px 14px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 13px;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #999;
    }

    .error-message {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .social-form-grid {
            grid-template-columns: 1fr;
        }
        .social-link-item{
            width: 550px;
        }

        .link_list {
            overflow-x: auto;

        }
    }
</style>

<div class="settings-container">
    <div class="page-header">
        <h1>Portfolio Settings</h1>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Logo and CV Settings -->
    <div class="settings-card">
        <h2 class="card-title">General Settings</h2>

        <form action="{{ route('dashboard.admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Logo Section -->
            <div class="form-group">
                <label class="form-label">Logo</label>
                @if($logo)
                    <div class="logo-preview">
                        <img src="{{ Storage::url($logo) }}" alt="Current Logo">
                    </div>
                @endif
                <input type="file" name="logo" accept="image/*" class="file-input">
                @error('logo')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- CV Section -->
            <div class="form-group">
                <label class="form-label">CV/Resume</label>
                @if($cv)
                    <div>
                        <a href="{{ Storage::url($cv) }}" target="_blank" class="cv-link">
                            View Current CV
                        </a>
                    </div>
                @endif
                <input type="file" name="cv" accept=".pdf,.doc,.docx" class="file-input">
                @error('cv')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary">
                Update Settings
            </button>
        </form>
    </div>

    <!-- Social Links Section -->
    <div class="settings-card">
        <h2 class="card-title">Social Links</h2>

        <!-- Add New Social Link Form -->
        <form action="{{ route('dashboard.admin.social-links.store') }}" method="POST" class="social-form">
            @csrf
            <div class="social-form-grid">
                <input type="text" name="platform" placeholder="Platform (e.g., Facebook)" required class="social-input">
                <input type="text" name="icon" placeholder="Icon (e.g., fab fa-facebook)" required class="social-input">
                <input type="url" name="url" placeholder="https://..." required class="social-input">
                <button type="submit" class="btn-add">Add Link</button>
            </div>
        </form>

        <!-- Social Links List -->
        <div class="link_list">
            @forelse($socialLinks as $link)
                <div class="row social-link-item">
                    <div class="social-info col-8">

                        <div class="social-details">
                            <h4>{{ $link->platform }}</h4>
                            <a href="{{ $link->url }}" target="_blank" class="social-url">
                                {{ $link->url }}
                            </a>
                        </div>
                    </div>
                    <div class="social-actions col-4 d-flex justify-content-end align-items-center">
                        <form action="{{ route('dashboard.admin.social-links.toggle', $link) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-toggle {{ $link->is_active ? 'active' : 'inactive' }}">
                                {{ $link->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                        <form action="{{ route('dashboard.admin.social-links.destroy', $link) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <p>No social links added yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
