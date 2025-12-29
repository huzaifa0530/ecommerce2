<div class="dropdown">
    <button class="btn btn-sm btn-light btn-icon" type="button"
        id="actionMenu{{ $model->id }}" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="feather icon-more-vertical"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right shadow"
        aria-labelledby="actionMenu{{ $model->id }}">
        <a class="dropdown-item text-dark update-status" href="#"
            data-id="{{ $model->id }}" data-status="approved">
            <i class="feather icon-check mr-2 text-success"></i> Approve
        </a>
        <a class="dropdown-item text-dark update-status" href="#"
            data-id="{{ $model->id }}" data-status="on-hold">
            <i class="feather icon-pause mr-2 text-warning"></i> On Hold
        </a>
        <a class="dropdown-item text-dark update-status" href="#"
            data-id="{{ $model->id }}" data-status="rejected">
            <i class="feather icon-x mr-2 text-danger"></i> Reject
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('requests.download-pdf', $model->id) }}" class="dropdown-item text-dark" href="javascript:window.print()">
            <i class="feather icon-printer mr-2 text-muted"></i> Print
        </a>
        
    </div>
</div>
