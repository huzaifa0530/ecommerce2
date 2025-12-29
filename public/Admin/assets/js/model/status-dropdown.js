document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (event) {
        const target = event.target.closest('.update-status');
        if (!target) return;

        event.preventDefault();

        const id = target.dataset.id;
        const newStatus = target.dataset.status;

        fetch(`/models/${id}/update-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Status updated successfully.');
                const row = document.querySelector(`tr[data-id="${id}"]`);
                if (row) {
                    const badge = row.querySelector('.badge');
                    badge.textContent = newStatus;
                    badge.className = `badge ${
                        newStatus === 'approved' ? 'badge-success' :
                        newStatus === 'pending' ? 'badge-warning' :
                        newStatus === 'rejected' ? 'badge-danger' :
                        newStatus === 'on-hold' ? 'badge-secondary' :
                        'badge-info'
                    }`;
                }
            } else {
                alert('An error occurred while updating the status.');
            }
        })
        .catch(err => {
            console.error('Error updating status:', err);
            alert('An error occurred while updating the status.');
        });
    });
});
