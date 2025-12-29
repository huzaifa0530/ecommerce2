<div class="card">
    <div class="card-header">
        <h5>All Users</h5>
        <span class="d-block m-t-5">This table displays all user requests with their current status.</span>
    </div>
    <div class="card-block table-border-style">
        <table class="table table-striped table-hover datatable nowrap">
         <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                 @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="fw-semibold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->roles->isNotEmpty())

                                <span class="badge bg-info text-light">
                                    {{ $user->roles->pluck('name')->join(', ') }}
                                </span>
                            @else

                                <span class="badge bg-secondary text-light">No Role</span>
                            @endif
                        </td>
                        <td class="text-center">

                            <div class="d-flex justify-content-center gap-2">
                                @can('users.edit')
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning text-light btn-icon">
                                        <i class="feather icon-edit"></i> 
                                    </a>
                                @endcan

                                @can('users.delete')
                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-icon ">
                                            <i class="feather icon-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            <i class="bi bi-exclamation-circle me-1"></i> No users found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
