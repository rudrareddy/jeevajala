// Profile Page JavaScript

// Edit Profile functionality
document.addEventListener('DOMContentLoaded', function() {
    const editProfileBtn = document.getElementById('editProfileBtn');
    const profileForm = document.getElementById('profileForm');
    const cancelProfileBtn = document.getElementById('cancelProfileBtn');
    
    if (editProfileBtn && profileForm) {
        editProfileBtn.addEventListener('click', function() {
            const inputs = profileForm.querySelectorAll('input, select, textarea');
            const formActions = profileForm.querySelector('.form-actions');
            
            inputs.forEach(input => {
                input.disabled = false;
                input.classList.add('editable');
            });
            
            if (formActions) {
                formActions.style.display = 'flex';
            }
            
            this.style.display = 'none';
        });

        if (cancelProfileBtn) {
            cancelProfileBtn.addEventListener('click', function() {
                const inputs = profileForm.querySelectorAll('input, select, textarea');
                const formActions = profileForm.querySelector('.form-actions');
                
                inputs.forEach(input => {
                    input.disabled = true;
                    input.classList.remove('editable');
                });
                
                if (formActions) {
                    formActions.style.display = 'none';
                }
                
                editProfileBtn.style.display = 'block';
            });
        }
        /*profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate saving
            console.log('Profile updated');
            alert('Profile information updated successfully!');
            
            const inputs = this.querySelectorAll('input, select, textarea');
            const formActions = this.querySelector('.form-actions');
            
            inputs.forEach(input => {
                input.disabled = true;
                input.classList.remove('editable');
            });
            
            if (formActions) {
                formActions.style.display = 'none';
            }
            
            editProfileBtn.style.display = 'block';
        });*/
    }
});

// Edit Bank Details functionality
document.addEventListener('DOMContentLoaded', function() {
    const editBankBtn = document.getElementById('editBankBtn');
    const bankForm = document.getElementById('bankForm');
    const cancelBankBtn = document.getElementById('cancelBankBtn');
    
    if (editBankBtn && bankForm) {
        editBankBtn.addEventListener('click', function() {
            const inputs = bankForm.querySelectorAll('input, select');
            const formActions = bankForm.querySelector('.form-actions');
            
            inputs.forEach(input => {
                input.disabled = false;
                input.classList.add('editable');
            });
            
            if (formActions) {
                formActions.style.display = 'flex';
            }
            
            this.style.display = 'none';
        });

        if (cancelBankBtn) {
            cancelBankBtn.addEventListener('click', function() {
                const inputs = bankForm.querySelectorAll('input, select');
                const formActions = bankForm.querySelector('.form-actions');
                
                inputs.forEach(input => {
                    input.disabled = true;
                    input.classList.remove('editable');
                });
                
                if (formActions) {
                    formActions.style.display = 'none';
                }
                
                editBankBtn.style.display = 'block';
            });
        }

        /*bankForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate bank details
            const accountNumber = this.querySelector('input[placeholder*="account number"]').value;
            //const confirmAccount = this.querySelector('input[placeholder*="Re-enter"]').value;
            
            if (accountNumber && confirmAccount && accountNumber !== confirmAccount) {
                alert('Account numbers do not match!');
                return;
            }
            
            // Simulate saving
            console.log('Bank details updated');
            alert('Bank details saved successfully!');
            
            const inputs = this.querySelectorAll('input, select');
            const formActions = this.querySelector('.form-actions');
            
            inputs.forEach(input => {
                input.disabled = true;
                input.classList.remove('editable');
            });
            
            if (formActions) {
                formActions.style.display = 'none';
            }
            
            editBankBtn.style.display = 'block';
        });*/
    }
});

// File Upload Functionality
function handleFileUpload(inputId, previewId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    
    if (!input || !preview) return;
    
    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (!file) return;
        
        // Validate file size (5MB max)
        if (file.size > 5 * 1024 * 1024) {
            alert('File size must be less than 5MB');
            this.value = '';
            return;
        }
        
        // Validate file type
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
        if (!validTypes.includes(file.type)) {
            alert('Please upload a valid image (JPG, PNG) or PDF file');
            this.value = '';
            return;
        }
        
        // Show preview
        const reader = new FileReader();
        
        reader.onload = function(event) {
            preview.classList.add('active');
            
            if (file.type.startsWith('image/')) {
                preview.innerHTML = `
                    <img src="${event.target.result}" alt="Preview">
                    <div class="file-preview-info">
                        <span class="file-name">${file.name}</span>
                        <button type="button" class="remove-file" onclick="removeFile('${inputId}', '${previewId}')">
                            <i class="fas fa-times"></i> Remove
                        </button>
                    </div>
                `;
            } else {
                preview.innerHTML = `
                    <div class="file-preview-info" style="height: 120px; align-items: center; justify-content: center; display: flex; flex-direction: column; gap: 1rem;">
                        <i class="fas fa-file-pdf" style="font-size: 3rem; color: #dc3545;"></i>
                        <span class="file-name">${file.name}</span>
                        <button type="button" class="remove-file" onclick="removeFile('${inputId}', '${previewId}')">
                            <i class="fas fa-times"></i> Remove
                        </button>
                    </div>
                `;
            }
        };
        
        reader.readAsDataURL(file);
        
        // Update status badge (simulate upload)
        setTimeout(() => {
            const card = input.closest('.document-upload-card');
            if (card) {
                const statusBadge = card.querySelector('.status-badge');
                if (statusBadge) {
                    statusBadge.className = 'status-badge status-pending';
                    statusBadge.innerHTML = '<i class="fas fa-clock me-1"></i>Pending Verification';
                }
            }
        }, 500);
    });
}

// Remove uploaded file
function removeFile(inputId, previewId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    
    if (input) input.value = '';
    if (preview) {
        preview.classList.remove('active');
        preview.innerHTML = '';
    }
    
    // Update status badge
    const card = input.closest('.document-upload-card');
    if (card) {
        const statusBadge = card.querySelector('.status-badge');
        if (statusBadge) {
            statusBadge.className = 'status-badge status-not-uploaded';
            statusBadge.innerHTML = '<i class="fas fa-times me-1"></i>Not Uploaded';
        }
    }
}

// Initialize file upload handlers
document.addEventListener('DOMContentLoaded', function() {
    //handleFileUpload('aadharFront', 'aadharFrontPreview');
    //handleFileUpload('aadharBack', 'aadharBackPreview');
    handleFileUpload('panCard', 'panCardPreview');
    handleFileUpload('dlFront', 'dlFrontPreview');
    handleFileUpload('dlBack', 'dlBackPreview');
    handleFileUpload('addressProof', 'addressProofPreview');
});

// Avatar Upload
document.addEventListener('DOMContentLoaded', function() {
    const avatarUpload = document.getElementById('avatarUpload');
    const profileAvatar = document.getElementById('profileAvatar');
    
    if (avatarUpload && profileAvatar) {
        avatarUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (!file) return;
            
            // Validate file
            if (file.size > 2 * 1024 * 1024) {
                alert('Avatar image must be less than 2MB');
                this.value = '';
                return;
            }
            
            if (!file.type.startsWith('image/')) {
                alert('Please upload an image file');
                this.value = '';
                return;
            }
            
            // Show preview
            const reader = new FileReader();
            reader.onload = function(event) {
                profileAvatar.src = event.target.result;
            };
            reader.readAsDataURL(file);
        });
    }
});

// Sidebar menu active state
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only handle hash links
            if (href && href.startsWith('#')) {
                e.preventDefault();
                
                // Remove active class from all items
                menuItems.forEach(mi => mi.classList.remove('active'));
                
                // Add active class to clicked item
                this.classList.add('active');
                
                // Scroll to section
                const target = document.querySelector(href);
                if (target) {
                    const offset = 100;
                    const targetPosition = target.offsetTop - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});

// Smooth scroll to sections
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#' || !href) return;
            
            e.preventDefault();
            
            const target = document.querySelector(href);
            if (target) {
                const offset = 100;
                const targetPosition = target.offsetTop - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Toggle switches with confirmation
document.addEventListener('DOMContentLoaded', function() {
    const switches = document.querySelectorAll('.form-check-input[type="checkbox"]');
    
    switches.forEach(switchEl => {
        switchEl.addEventListener('change', function() {
            const isChecked = this.checked;
            const label = this.parentElement.parentElement.querySelector('h5').textContent;
            
            console.log(`${label} ${isChecked ? 'enabled' : 'disabled'}`);
            
            // You can add confirmation dialogs here if needed
            if (this.id === 'twoFactorSwitch' && isChecked) {
                // Simulate 2FA setup
                setTimeout(() => {
                    alert('Two-factor authentication setup will be initiated. You will receive a verification code on your registered phone number.');
                }, 300);
            }
        });
    });
});

// Add animation to stat cards
document.addEventListener('DOMContentLoaded', function() {
    const statCards = document.querySelectorAll('.stat-card');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    statCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });
});

// Password strength indicator for security section
function showPasswordChangeModal() {
    // This would open a modal for password change
    alert('Password change functionality will open in a modal. Implementation requires backend integration.');
}

// Export profile data (future feature)
function exportProfileData() {
    console.log('Exporting profile data...');
    alert('Profile data export feature will be implemented with backend integration.');
}

// Delete account (future feature)
function deleteAccount() {
    const confirmation = confirm('Are you sure you want to delete your account? This action cannot be undone.');
    if (confirmation) {
        console.log('Account deletion requested');
        alert('Account deletion request will be processed. You will receive a confirmation email.');
    }
}

// Form validation helper
function validateIFSC(ifsc) {
    const ifscRegex = /^[A-Z]{4}0[A-Z0-9]{6}$/;
    return ifscRegex.test(ifsc);
}

function validateAccountNumber(accountNumber) {
    return accountNumber.length >= 9 && accountNumber.length <= 18 && /^\d+$/.test(accountNumber);
}

// Add real-time validation to bank form
document.addEventListener('DOMContentLoaded', function() {
    const ifscInput = document.querySelector('input[placeholder*="IFSC"]');
    const accountInput = document.querySelector('input[placeholder*="account number"]');
    
    if (ifscInput) {
        ifscInput.addEventListener('blur', function() {
            if (this.value && !validateIFSC(this.value)) {
                this.style.borderColor = '#dc3545';
                alert('Please enter a valid IFSC code (e.g., SBIN0001234)');
            } else if (this.value) {
                this.style.borderColor = '#28a745';
            }
        });
    }
    
    if (accountInput) {
        accountInput.addEventListener('blur', function() {
            if (this.value && !validateAccountNumber(this.value)) {
                this.style.borderColor = '#dc3545';
                alert('Please enter a valid account number (9-18 digits)');
            } else if (this.value) {
                this.style.borderColor = '#28a745';
            }
        });
    }
});

// Prevent navigation away from unsaved changes
let hasUnsavedChanges = false;

document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input:not([type="file"]), select, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                if (!this.disabled) {
                    hasUnsavedChanges = true;
                }
            });
        });
        
        form.addEventListener('submit', function() {
            hasUnsavedChanges = false;
        });
    });
});

window.addEventListener('beforeunload', function(e) {
    if (hasUnsavedChanges) {
        e.preventDefault();
        e.returnValue = '';
        return '';
    }
});

// Notification system (placeholder)
function showNotification(message, type = 'success') {
    // This would show a toast notification
    console.log(`Notification [${type}]: ${message}`);
}

// Initialize tooltips (if Bootstrap tooltips are needed)
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    if (window.bootstrap && window.bootstrap.Tooltip) {
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
});

// Document Upload Functions
function uploadAadhar() {
    const frontFile = document.getElementById('aadharFront').files[0];
    const backFile = document.getElementById('aadharBack').files[0];
    
    if (!frontFile || !backFile) {
        alert('Please select both front and back images of Aadhar card');
        return;
    }
    
    // Validate file sizes
    if (frontFile.size > 2 * 1024 * 1024 || backFile.size > 2 * 1024 * 1024) {
        alert('Each file must be less than 2MB');
        return;
    }
    
    // Show loading state
    const uploadButton = event.target;
    const originalText = uploadButton.innerHTML;
    uploadButton.disabled = true;
    uploadButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Uploading...';
    
    // Create FormData object
    const formData = new FormData();
    formData.append('aadhar_front', frontFile);
    formData.append('aadhar_back', backFile);
    formData.append('user_id', 'STM25608843'); // Get from session/auth
    formData.append('document_type', 'aadhar');
    
    // AJAX Upload to Backend
    fetch('/api/documents/upload', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
            // 'Authorization': 'Bearer ' + localStorage.getItem('token') // If using JWT
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Upload successful:', data);
        
        // Reset button state
        uploadButton.disabled = false;
        uploadButton.innerHTML = originalText;
        
        if (data.success) {
            // Show success message
            showNotification('Aadhar card uploaded successfully! Your documents are under verification.', 'success');
            
            // Toggle display states
            const card = document.getElementById('aadharFront').closest('.document-upload-card');
            card.querySelector('.not-uploaded-state').style.display = 'none';
            card.querySelector('.uploaded-state').style.display = 'block';
            
            // Update uploaded images if backend returns URLs
            if (data.front_url && data.back_url) {
                const uploadedState = card.querySelector('.uploaded-state');
                const frontImg = uploadedState.querySelector('.uploaded-doc-item:first-child .uploaded-doc-img');
                const backImg = uploadedState.querySelector('.uploaded-doc-item:last-child .uploaded-doc-img');
                
                // Replace gradient with actual images
                frontImg.style.background = 'none';
                frontImg.innerHTML = `<img src="${data.front_url}" alt="Aadhar Front" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;">`;
                
                backImg.style.background = 'none';
                backImg.innerHTML = `<img src="${data.back_url}" alt="Aadhar Back" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;">`;
            }
            
            // Update status badge
            const statusBadge = card.querySelector('.status-badge');
            statusBadge.className = 'status-badge status-pending';
            statusBadge.innerHTML = '<i class="fas fa-clock me-1"></i>Pending Verification';
            
            // Clear file inputs
            document.getElementById('aadharFront').value = '';
            document.getElementById('aadharBack').value = '';
        } else {
            throw new Error(data.message || 'Upload failed');
        }
    })
    .catch(error => {
        console.error('Upload error:', error);
        
        // Reset button state
        uploadButton.disabled = false;
        uploadButton.innerHTML = originalText;
        
        // Show error message
        showNotification('Failed to upload Aadhar card. Please try again.', 'error');
        alert('Upload failed: ' + error.message);
    });
}

function uploadPAN() {
    const panFile = document.getElementById('panCard').files[0];
    
    if (!panFile) {
        alert('Please select PAN card image');
        return;
    }
    
    // Validate file size
    if (panFile.size > 5 * 1024 * 1024) {
        alert('File must be less than 5MB');
        return;
    }
    
    // Show loading state
    const uploadButton = event.target;
    const originalText = uploadButton.innerHTML;
    uploadButton.disabled = true;
    uploadButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Uploading...';
    
    // Create FormData object
    const formData = new FormData();
    formData.append('pan_card', panFile);
    formData.append('user_id', 'STM25608843'); // Get from session/auth
    formData.append('document_type', 'pan');
    
    // AJAX Upload to Backend
    fetch('/api/documents/upload', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Upload successful:', data);
        
        // Reset button state
        uploadButton.disabled = false;
        uploadButton.innerHTML = originalText;
        
        if (data.success) {
            // Show success message
            showNotification('PAN card uploaded successfully! Your document is under verification.', 'success');
            
            // Toggle display states
            const card = document.getElementById('panCard').closest('.document-upload-card');
            card.querySelector('.not-uploaded-state').style.display = 'none';
            card.querySelector('.uploaded-state').style.display = 'block';
            
            // Update uploaded image if backend returns URL
            if (data.pan_url) {
                const uploadedState = card.querySelector('.uploaded-state');
                const panImg = uploadedState.querySelector('.uploaded-doc-img');
                
                // Replace gradient with actual image
                panImg.style.background = 'none';
                panImg.innerHTML = `<img src="${data.pan_url}" alt="PAN Card" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;">`;
            }
            
            // Update status badge
            const statusBadge = card.querySelector('.status-badge');
            statusBadge.className = 'status-badge status-pending';
            statusBadge.innerHTML = '<i class="fas fa-clock me-1"></i>Pending Verification';
            
            // Clear file input
            document.getElementById('panCard').value = '';
        } else {
            throw new Error(data.message || 'Upload failed');
        }
    })
    .catch(error => {
        console.error('Upload error:', error);
        
        // Reset button state
        uploadButton.disabled = false;
        uploadButton.innerHTML = originalText;
        
        // Show error message
        showNotification('Failed to upload PAN card. Please try again.', 'error');
        alert('Upload failed: ' + error.message);
    });
}

function viewAadhar() {
    // Fetch document URLs from backend
    fetch('/api/documents/get?user_id=STM25608843&document_type=aadhar', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Create modal to view documents
            const modalHTML = `
                <div class="modal fade" id="viewAadharModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Aadhar Card Documents</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h6>Front Side</h6>
                                        <img src="${data.front_url}" class="img-fluid rounded" alt="Aadhar Front">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h6>Back Side</h6>
                                        <img src="${data.back_url}" class="img-fluid rounded" alt="Aadhar Back">
                                    </div>
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
            const existingModal = document.getElementById('viewAadharModal');
            if (existingModal) existingModal.remove();
            
            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('viewAadharModal'));
            modal.show();
        } else {
            alert('Failed to load documents');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to load documents');
    });
}

function editAadhar() {
    const confirmation = confirm('Are you sure you want to edit your Aadhar card? You will need to upload new images.');
    if (!confirmation) return;
    
    const card = document.getElementById('aadharFront').closest('.document-upload-card');
    card.querySelector('.uploaded-state').style.display = 'none';
    card.querySelector('.not-uploaded-state').style.display = 'block';
    
    // Update status
    const statusBadge = card.querySelector('.status-badge');
    statusBadge.className = 'status-badge status-not-uploaded';
    statusBadge.innerHTML = '<i class="fas fa-times me-1"></i>Not Uploaded';
    
    // Clear file inputs
    document.getElementById('aadharFront').value = '';
    document.getElementById('aadharBack').value = '';
}

function deleteAadhar() {
    const confirmation = confirm('Are you sure you want to delete your Aadhar card documents? This action cannot be undone.');
    if (!confirmation) return;
    
    // Show loading
    showNotification('Deleting documents...', 'info');
    
    // AJAX Delete Request
    fetch('/api/documents/delete', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        },
        body: JSON.stringify({
            user_id: 'STM25608843',
            document_type: 'aadhar'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            editAadhar(); // Reuse the edit function logic
            showNotification('Aadhar card documents deleted successfully.', 'success');
        } else {
            throw new Error(data.message || 'Delete failed');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Failed to delete documents.', 'error');
    });
}

function viewPAN() {
    // Fetch document URL from backend
    fetch('/api/documents/get?user_id=STM25608843&document_type=pan', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Create modal to view document
            const modalHTML = `
                <div class="modal fade" id="viewPANModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">PAN Card Document</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="${data.pan_url}" class="img-fluid rounded" alt="PAN Card">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Remove existing modal if any
            const existingModal = document.getElementById('viewPANModal');
            if (existingModal) existingModal.remove();
            
            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('viewPANModal'));
            modal.show();
        } else {
            alert('Failed to load document');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to load document');
    });
}

function editPAN() {
    const confirmation = confirm('Are you sure you want to edit your PAN card? You will need to upload a new image.');
    if (!confirmation) return;
    
    const card = document.getElementById('panCard').closest('.document-upload-card');
    card.querySelector('.uploaded-state').style.display = 'none';
    card.querySelector('.not-uploaded-state').style.display = 'block';
    
    // Update status
    const statusBadge = card.querySelector('.status-badge');
    statusBadge.className = 'status-badge status-not-uploaded';
    statusBadge.innerHTML = '<i class="fas fa-times me-1"></i>Not Uploaded';
    
    // Clear file input
    document.getElementById('panCard').value = '';
}

function deletePAN() {
    const confirmation = confirm('Are you sure you want to delete your PAN card document? This action cannot be undone.');
    if (!confirmation) return;
    
    // Show loading
    showNotification('Deleting document...', 'info');
    
    // AJAX Delete Request
    fetch('/api/documents/delete', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        },
        body: JSON.stringify({
            user_id: 'STM25608843',
            document_type: 'pan'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            editPAN(); // Reuse the edit function logic
            showNotification('PAN card document deleted successfully.', 'success');
        } else {
            throw new Error(data.message || 'Delete failed');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Failed to delete document.', 'error');
    });
}

// Team Member Functions
function viewMember(memberId) {
    console.log('Viewing member:', memberId);
    
    // Fetch member details from backend
    fetch(`/api/team/member/${memberId}`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show member details in modal or redirect to detail page
            alert(`Viewing details for: ${data.member.name}\nEmail: ${data.member.email}\nPhone: ${data.member.phone}`);
            // In real implementation, show in a modal with full details
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to load member details');
    });
}

// Transaction Functions
function viewTransaction(transactionId) {
    console.log('Viewing transaction:', transactionId);
    
    // Fetch transaction details from backend
    fetch(`/api/transactions/${transactionId}`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show transaction details in modal
            alert(`Transaction ID: ${data.transaction.id}\nAmount: ₹${data.transaction.amount}\nStatus: ${data.transaction.status}`);
            // In real implementation, show in a modal with full details
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to load transaction details');
    });
}

// Enhanced Notification System
function showNotification(message, type = 'success') {
    // Create toast notification
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
    
    // Add toast to body
    document.body.insertAdjacentHTML('beforeend', toastHTML);
    
    // Show toast
    const toastElement = document.body.lastElementChild;
    const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
    toast.show();
    
    // Remove from DOM after hidden
    toastElement.addEventListener('hidden.bs.toast', function() {
        toastElement.remove();
    });
}

// Filter buttons for transactions
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-buttons .btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter logic
            const filterType = this.textContent.trim().toLowerCase();
            console.log('Filtering transactions by:', filterType);
            
            // In real implementation, make AJAX request to filter transactions
            fetch(`/api/transactions?filter=${filterType}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                }
            })
            .then(response => response.json())
            .then(data => {
                // Update transaction table with filtered data
                console.log('Filtered transactions:', data);
            })
            .catch(error => {
                console.error('Filter error:', error);
            });
        });
    });
});

// Document Upload Functions
function uploadAadhar() {
    const frontFile = document.getElementById('aadharFront').files[0];
    const backFile = document.getElementById('aadharBack').files[0];
    
    if (!frontFile || !backFile) {
        alert('Please select both front and back images of Aadhar card');
        return;
    }
    
    // Simulate upload
    console.log('Uploading Aadhar card...');
    alert('Aadhar card uploaded successfully! Your documents are under verification.');
    
    // Toggle display states
    const card = document.getElementById('aadharFront').closest('.document-upload-card');
    card.querySelector('.not-uploaded-state').style.display = 'none';
    card.querySelector('.uploaded-state').style.display = 'block';
    
    // Update status
    const statusBadge = card.querySelector('.status-badge');
    statusBadge.className = 'status-badge status-pending';
    statusBadge.innerHTML = '<i class="fas fa-clock me-1"></i>Pending Verification';
}

function uploadPAN() {
    const panFile = document.getElementById('panCard').files[0];
    
    if (!panFile) {
        alert('Please select PAN card image');
        return;
    }
    
    // Simulate upload
    console.log('Uploading PAN card...');
    alert('PAN card uploaded successfully! Your document is under verification.');
    
    // Toggle display states
    const card = document.getElementById('panCard').closest('.document-upload-card');
    card.querySelector('.not-uploaded-state').style.display = 'none';
    card.querySelector('.uploaded-state').style.display = 'block';
    
    // Update status
    const statusBadge = card.querySelector('.status-badge');
    statusBadge.className = 'status-badge status-pending';
    statusBadge.innerHTML = '<i class="fas fa-clock me-1"></i>Pending Verification';
}

function viewAadhar() {
    alert('Viewing Aadhar card documents...\nThis will open a modal with full-size images.');
    // In real implementation, open a modal with document images
}

function editAadhar() {
    const card = document.getElementById('aadharFront').closest('.document-upload-card');
    card.querySelector('.uploaded-state').style.display = 'none';
    card.querySelector('.not-uploaded-state').style.display = 'block';
    
    // Update status
    const statusBadge = card.querySelector('.status-badge');
    statusBadge.className = 'status-badge status-not-uploaded';
    statusBadge.innerHTML = '<i class="fas fa-times me-1"></i>Not Uploaded';
    
    // Clear file inputs
    document.getElementById('aadharFront').value = '';
    document.getElementById('aadharBack').value = '';
}

function deleteAadhar() {
    const confirmation = confirm('Are you sure you want to delete your Aadhar card documents?');
    if (confirmation) {
        editAadhar(); // Reuse the edit function logic
        alert('Aadhar card documents deleted successfully.');
    }
}

function viewPAN() {
    alert('Viewing PAN card document...\nThis will open a modal with full-size image.');
    // In real implementation, open a modal with document image
}

function editPAN() {
    const card = document.getElementById('panCard').closest('.document-upload-card');
    card.querySelector('.uploaded-state').style.display = 'none';
    card.querySelector('.not-uploaded-state').style.display = 'block';
    
    // Update status
    const statusBadge = card.querySelector('.status-badge');
    statusBadge.className = 'status-badge status-not-uploaded';
    statusBadge.innerHTML = '<i class="fas fa-times me-1"></i>Not Uploaded';
    
    // Clear file input
    document.getElementById('panCard').value = '';
}

function deletePAN() {
    const confirmation = confirm('Are you sure you want to delete your PAN card document?');
    if (confirmation) {
        editPAN(); // Reuse the edit function logic
        alert('PAN card document deleted successfully.');
    }
}

// Team Member Functions
function viewMember(memberId) {
    console.log('Viewing member:', memberId);
    alert(`Viewing details for member ID: ${memberId}\nThis will open a modal with member information.`);
    // In real implementation, fetch and display member details in a modal
}

// Transaction Functions
function viewTransaction(transactionId) {
    console.log('Viewing transaction:', transactionId);
    alert(`Viewing transaction details for: ${transactionId}\nThis will open a modal with complete transaction information.`);
    // In real implementation, fetch and display transaction details in a modal
}

// Filter buttons for transactions
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-buttons .btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter logic would go here
            const filterType = this.textContent.trim();
            console.log('Filtering transactions by:', filterType);
            
            // In real implementation, filter the transaction table based on type
        });
    });
});