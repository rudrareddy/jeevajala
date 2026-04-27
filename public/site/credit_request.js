// Credit Requests JavaScript

// Request referral bonus
function requestReferralBonus(referralId) {
    if (!confirm('Do you want to request credit for this referral bonus?')) {
        return;
    }

    const data = {
        user_id: 'STM25608843',
        request_type: 'referral_bonus',
        amount: 200.00,
        reason: 'Referral bonus for successfully referring a new member',
        reference_id: referralId
    };

    submitCreditRequestAJAX(data);
}

// Request commission
function requestCommission(commissionId) {
    if (!confirm('Do you want to request credit for this commission?')) {
        return;
    }

    const data = {
        user_id: 'STM25608843',
        request_type: 'commission_claim',
        amount: 1200.00,
        reason: 'Team sales commission for February 2026',
        reference_id: commissionId
    };

    submitCreditRequestAJAX(data);
}

// Submit credit request from form
function submitCreditRequest() {
    const form = document.getElementById('creditRequestForm');
    
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    const requestType = document.getElementById('requestType').value;
    const amount = parseFloat(document.getElementById('requestAmount').value);
    const reason = document.getElementById('requestReason').value;
    const files = document.getElementById('supportingDocs').files;

    if (!requestType || !amount || !reason) {
        alert('Please fill in all required fields');
        return;
    }

    // Create FormData for file upload
    const formData = new FormData();
    formData.append('user_id', 'STM25608843');
    formData.append('request_type', requestType);
    formData.append('amount', amount);
    formData.append('reason', reason);

    // Append files if any
    for (let i = 0; i < files.length; i++) {
        formData.append('supporting_documents[]', files[i]);
    }

    // Show loading state
    const submitBtn = event.target;
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';

    // AJAX request
    fetch('/api/credit-requests/create', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;

        if (data.success) {
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('newRequestModal'));
            modal.hide();

            // Reset form
            form.reset();

            // Show success message
            showNotification('Credit request submitted successfully! Awaiting admin approval.', 'success');

            // Reload page after 2 seconds
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        } else {
            throw new Error(data.message || 'Failed to submit request');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        showNotification('Failed to submit credit request. Please try again.', 'error');
    });
}

// Helper function for AJAX requests
function submitCreditRequestAJAX(data) {
    fetch('/api/credit-requests/create', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            showNotification('Credit request submitted successfully!', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        } else {
            throw new Error(result.message || 'Failed to submit request');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Failed to submit request. Please try again.', 'error');
    });
}

// View request details
function viewRequest(requestId) {
    // Fetch request details
    fetch(`/api/credit-requests/${requestId}`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const request = data.request;
            
            // Create modal HTML
            const modalHTML = `
                <div class="modal fade" id="viewRequestModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Credit Request Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <strong>Request ID:</strong><br>
                                        <span class="request-id">${request.request_id}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Status:</strong><br>
                                        <span class="badge bg-${getStatusColor(request.status)}">${request.status}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Request Type:</strong><br>
                                        ${request.request_type}
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Amount:</strong><br>
                                        ₹${parseFloat(request.amount).toFixed(2)}
                                    </div>
                                    <div class="col-12">
                                        <strong>Reason:</strong><br>
                                        ${request.reason}
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Request Date:</strong><br>
                                        ${new Date(request.created_at).toLocaleString()}
                                    </div>
                                    ${request.processed_at ? `
                                    <div class="col-md-6">
                                        <strong>Processed Date:</strong><br>
                                        ${new Date(request.processed_at).toLocaleString()}
                                    </div>
                                    ` : ''}
                                    ${request.admin_notes ? `
                                    <div class="col-12">
                                        <strong>Admin Notes:</strong><br>
                                        <div class="alert alert-info">${request.admin_notes}</div>
                                    </div>
                                    ` : ''}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Remove existing modal if any
            const existingModal = document.getElementById('viewRequestModal');
            if (existingModal) existingModal.remove();

            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', modalHTML);

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('viewRequestModal'));
            modal.show();
        } else {
            showNotification('Failed to load request details', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Failed to load request details', 'error');
    });
}

// Cancel request
function cancelRequest(requestId) {
    if (!confirm('Are you sure you want to cancel this credit request?')) {
        return;
    }

    fetch(`/api/credit-requests/${requestId}/cancel`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Credit request cancelled successfully', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            throw new Error(data.message || 'Failed to cancel request');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Failed to cancel request', 'error');
    });
}

// Filter requests
function filterRequests(status) {
    const rows = document.querySelectorAll('.credit-request-table tbody tr');
    const buttons = document.querySelectorAll('.filter-buttons .btn');

    // Update active button
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');

    // Filter rows
    rows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        if (status === 'all' || rowStatus === status) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Helper function to get status badge color
function getStatusColor(status) {
    const colors = {
        'pending': 'warning',
        'approved': 'success',
        'rejected': 'danger',
        'processing': 'info'
    };
    return colors[status] || 'secondary';
}

// Show notification
function showNotification(message, type = 'success') {
    const toastHTML = `
        <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} border-0" role="alert" style="position: fixed; top: 90px; right: 20px; z-index: 9999;">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;

    document.body.insertAdjacentHTML('beforeend', toastHTML);
    const toastElement = document.body.lastElementChild;
    const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
    toast.show();

    toastElement.addEventListener('hidden.bs.toast', function() {
        toastElement.remove();
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    console.log('Credit Requests page loaded');
});
