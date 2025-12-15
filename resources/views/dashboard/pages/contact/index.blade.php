@extends('layouts.app')

@section('title', 'Contact Messages')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Contact Messages</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Contacts</li>
                    <li class="breadcrumb-item">All</li>
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
                    <div class="card-header">
                        <h5>All Contact Messages</h5>
                        <span class="d-block m-t-5">
                            This table shows all messages sent from Contact Us page.
                        </span>
                    </div>

                    <div class="card-block table-border-style">
                        <table class="table table-striped table-hover datatable nowrap">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>
                                            {{ $contact->first_name }}
                                            {{ $contact->last_name }}
                                        </td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone ?? 'N/A' }}</td>
                                        <td style="max-width:300px">
                                            {{ Str::limit($contact->message, 80) }}
                                        </td>
                                        <td>{{ $contact->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No contact messages found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $contacts->links() }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
