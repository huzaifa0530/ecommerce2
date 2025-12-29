@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">User Profile</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Pages</a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="main-body">
        <div class="page-wrapper">
            <div class="row">
                <!-- Profile Summary -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('Admin/assets/images/user/avatar-1.jpg') }}"
                                class="img-radius mb-3" alt="Profile Image" width="100">
                            <h5 class="mb-0">{{ $user->name }}</h5>

                            <hr>
                            <p><i class="feather icon-mail mr-2"></i> {{ $user->email }}</p>
                            <!-- <p><i class="feather icon-phone mr-2"></i> {{ $user->phone ?? 'No phone set' }}</p>
                            <p><i class="feather icon-map-pin mr-2"></i> {{ $user->address ?? 'No address set' }}</p> -->

                            <!-- Change Password Button -->
                            <button type="button" class="btn btn-warning mt-3" data-toggle="modal"
                                data-target="#changePasswordModal">
                                Change Password
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Profile Edit Form -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🔹 Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection