<h5 class="text-dark">Brand Form</h5>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Brand Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Brand Name">
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>

    <!-- Extra brand-specific field -->
    <div class="form-group mb-3">
        <label>Confirm Password</label>
        <input 
            type="password" 
            name="password_confirmation" 
            class="form-control" 
            placeholder="Confirm Password">
    </div>

    <!-- Hidden field to identify user type -->
    <input type="hidden" name="type" value="brand">

    <button type="submit" class="btn btn-success">Submit Brand</button>
</form>
