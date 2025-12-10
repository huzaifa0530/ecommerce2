@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit User</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="main-body">
        <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Update User Information</h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Name -->
                                <div class="form-group mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label>Email address</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-3">
                                    <label>Password <small class="text-muted">(leave blank to keep current)</small></label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter New Password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password">
                                </div>

                                <!-- Role Dropdown -->
                                <!-- Role Dropdown -->
                                <div class="form-group mb-3">
                                    <label>Assign Role</label>
                                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                        <option value="">-- Select Role --</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role && $user->role->id === $role->id ? 'selected' : '' }}>
                                                {{ ucfirst($role->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <button type="submit" class="btn btn-warning">Update User</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

@endsection