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

                            <form action="{{ route('categories.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
<div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="parent_id" class="form-label">Parent Category</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="">-- None (Main Category) --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ (isset($category) && $category->parent_id == $cat->id) ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
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