@extends('backends.layout')
@section('backend_content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="m-0">Edit Profile</h4>
                <a href="{{ route('dashboard.my.profile') }}" class="btn btn-primary">Back</a>
            </div>

            <div class="card-body">
                <form action="{{ route('dashboard.profile.info') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4 text-center position-relative">
                            <span class="remove_btn"
                                style="position: absolute; line-height: 0; right: 49px; top: -8px; color: red; border: 1px solid red; display: none; align-items: center; padding: 8px; border-radius: 10px; cursor: pointer;">
                                <iconify-icon icon="pajamas:remove" width="16" height="16"></iconify-icon>
                            </span>
                            <label for="imgInp">
                                <img id="user_image"
                                    style="max-width: 200px; width: 100%; border: 1px solid #00000024; padding: 20px; cursor: pointer;"
                                    class="img-fluid"
                                    src="{{ $user->user_image ? asset($user->user_image) : asset('backend/assets/images/uplode_image.png') }}"
                                    alt="">
                            </label>
                            <input name="user_image" hidden accept="image/*" type='file' id="imgInp" />
                            @error('user_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input value="{{ $user->name }}" type="text" name="name" placeholder="Name"
                                        class="form-control mb-2">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input value="{{ $user->title }}" type="text" name="title" placeholder="Title"
                                        class="form-control mb-2">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input value="{{ $user->phone }}" type="text" name="phone" placeholder="Phone"
                                        class="form-control mb-2">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input value="{{ $user->age }}" type="text" name="age" placeholder="Age"
                                        class="form-control mb-2">
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input value="{{ $user->email }}" type="text" name="email" placeholder="Email"
                                        class="form-control mb-2">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input value="{{ $user->experience }}" type="text" name="experience"
                                        placeholder="Experience" class="form-control mb-2">
                                    @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Description" name="description" id="description"
                                        class="form-control mb-2">{{ $user->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div>
                        </div>

                    </div>
                    <button class="btn btn-primary w-100">Update</button>

                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Change Password</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('dashboard.profile.password.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                            id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            id="new_password" name="new_password" required>
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Password must be at least 8 characters</small>
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('backend_js')
    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>

    <script>
        let defaultImage = `{{ asset('assets/img/uplode-image.jpg') }}`;


        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                user_image.src = URL.createObjectURL(file)
                $('.remove_btn').show()
            }
        }

        $('.remove_btn').on('click', function () {
            $('#user_image').attr('src', defaultImage)
            $('.remove_btn').hide()
        })
    </script>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files;
            if (file) {
                user_image.src = URL.createObjectURL(file);
                document.querySelector('.remove_btn').style.display = 'flex';
            }
        }

        // Remove image functionality
        document.querySelector('.remove_btn').addEventListener('click', function () {
            document.getElementById('imgInp').value = '';
            document.getElementById('user_image').src = '{{ asset("backend/assets/images/uplode_image.png") }}';
            this.style.display = 'none';
        });
    </script>
@endpush
