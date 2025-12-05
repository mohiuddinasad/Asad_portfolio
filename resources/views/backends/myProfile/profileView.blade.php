@extends('backends.layout')
@section('backend_content')
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-header d-flex align-items-center justify-content-between border-0">
                <h3 class="m-0">My Profile</h3>
                <a href="{{ route('dashboard.profile.edit') }}" class="btn btn-primary"> Edit Profile</a>
            </div>
            <div class="card-body ">
                <div class="row p-2 border" style="border-radius: 12px;">
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img style="border-radius: 15px;" class="img-fluid"
                                    src="{{ Auth::user()->user_image ? asset(Auth::user()->user_image) : asset('frontend/assets/img/profile 1.jpg') }}"
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-9">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="mb-1">{{ Auth::user()->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body profile_info">
                <div class="header">
                    <h4 class="mb-4">Profile Information</h4>
                </div>
                <div class="row border p-3" style="border-radius: 12px; ">
                    <div class="col-lg-4">
                        <p><b>Name:</b> {{ Auth::user()->name }}</p>
                        <p><b>Title:</b> {{ Auth::user()->title }}</p>
                        <p><b>email:</b> {{ Auth::user()->email }}</p>
                        <p><b>phone:</b> {{ Auth::user()->phone }}</p>
                        <p><b>Age:</b> {{ Auth::user()->age }}</p>
                    </div>
                    <div class="col-lg-8">
                        <h5>Description :</h5>
                        <p>{{ Auth::user()->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
