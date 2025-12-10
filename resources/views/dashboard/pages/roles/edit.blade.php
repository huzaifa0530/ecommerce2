@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit Role</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Role</a></li>
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
                            <h5>Update Role</h5>
                        </div>
                        <div class="card-body">

                            <!-- Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form -->
                            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                @csrf
                                @method('PUT')

                                <!-- Role Name -->
                                <div class="form-group mb-3">
                                    <label>Role Name</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        value="{{ old('name', $role->name) }}" 
                                        placeholder="Enter Role Name" 
                                        required
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Permissions -->
                                <div class="form-group mb-3">
                                    <label>Assign Permissions</label>
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                            <div class="col-md-6">
                                                <div class="form-check mb-2">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="checkbox" 
                                                        name="permissions[]" 
                                                        id="perm_{{ $permission->id }}" 
                                                        value="{{ $permission->name }}" 
                                                        {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                        {{ ucfirst($permission->name) }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button type="submit" class="btn btn-primary">Update Role</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

@endsection
