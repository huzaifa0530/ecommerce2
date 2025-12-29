@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Roles</h2>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Create Role
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Roles</h5>
            <span class="d-block m-t-5">This table displays all roles with their assigned permissions.</span>
        </div>
        <div class="card-block table-border-style">
            <table class="table table-striped table-hover datatable nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Permissions</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td class="fw-semibold">{{ $role->name }}</td>
                            <td>
                                @if($role->permissions->isNotEmpty())
                                    <span class="badge bg-info text-light">
                                        {{ $role->permissions->pluck('name')->join(', ') }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary text-light">No Permissions</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    @can('roles.edit')
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning text-light btn-icon">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                    @endcan

                                    @can('roles.delete')
                                        <form action="{{ route('roles.destroy', $role) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this role?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-icon">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                <i class="bi bi-exclamation-circle me-1"></i> No roles found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $roles->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
