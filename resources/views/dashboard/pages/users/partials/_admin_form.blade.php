<h5 class="text-dark">Admin Form</h5>
<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <!-- Name -->
    <div class="form-group mb-3">
        <label>Name</label>
        <input 
            type="text" 
            name="name" 
            class="form-control @error('name') is-invalid @enderror" 
            placeholder="Enter Name"
            value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group mb-3">
        <label>Email address</label>
        <input 
            type="email" 
            name="email" 
            class="form-control @error('email') is-invalid @enderror" 
            placeholder="Enter Email"
            value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group mb-3">
        <label>Password</label>
        <input 
            type="password" 
            name="password" 
            class="form-control @error('password') is-invalid @enderror" 
            placeholder="Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="form-group mb-3">
        <label>Confirm Password</label>
        <input 
            type="password" 
            name="password_confirmation" 
            class="form-control" 
            placeholder="Confirm Password">
    </div>

    <!-- Roles -->
    <!-- <div class="form-group mb-3">
        <label>Assign Roles</label>
        <div class="row">
            @foreach($roles as $role)
                <div class="col-md-6">
                    <div class="form-check">
                        <input 
                            type="checkbox" 
                            name="roles[]" 
                            value="{{ $role->name }}" 
                            class="form-check-input" 
                            id="admin_role_{{ $role->id }}">
                        <label class="form-check-label" for="admin_role_{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div> -->

    <!-- Hidden Field -->
    <input type="hidden" name="type" value="admin">

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Submit Admin</button>
</form>
