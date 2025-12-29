<div class="modal fade" id="viewRequestModal" tabindex="-1" role="dialog"
     aria-labelledby="viewRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg border-0 rounded">
                      <div class="modal-header text-white">
                <h5 class="modal-title" id="viewRequestModalLabel">
                    <i class="feather icon-user mr-2"></i> Registration Details
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- 👇 THIS IS THE TARGET BODY -->
            <div class="modal-body" id="modelDetails">
                <p class="text-center text-muted">Loading details...</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <i class="feather icon-printer"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>
