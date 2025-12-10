@extends('layouts.app')

@section('title', 'Categories')

@section('content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Categories</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Categories</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">All</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="main-body">
        <div class="page-wrapper">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
    <div class="card-header d-flex justify-content-between">
        <div>
                            <h5>All Categories</h5>
                            <span class="d-block m-t-5">This table displays all category 
                                status.</span>
                          </div>
                                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add Categories</a>

                        </div>

                         
                        <div class="card-block table-border-style">
                            <table class="table table-striped table-hover datatable nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Name</th>
                                       <th scope="col">Sub </th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($categories as $category)
<tr>
    <td>{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>
        @if($category->subcategories->count())
            <ul>
                @foreach($category->subcategories as $sub)
                    <li>{{ $sub->name }}</li>
                @endforeach
            </ul>
        @else
            None
        @endif
    </td>
    <td>
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete category?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection