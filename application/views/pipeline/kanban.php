<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page">
    <div class="block col-12 mb-4 heading-white">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <h4><i class="bi bi-columns-gap me-2"></i> <?= htmlspecialchars($title) ?></h4>
            <a href="<?= site_url('jobs') ?>" class="button hex-btn small">
                <i class="bi bi-arrow-right me-1"></i> العودة للوظائف
            </a>
        </div>
    </div>
    
    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-2">
                    <form method="get" action="<?= base_url('pipeline/index/' . $job['id']) ?>" class="row align-items-center">
                        <div class="col-md-3">
                            <label class="form-label">فلترة حسب موقع العمل:</label>
                        </div>
                        <div class="col-md-6">
                            <select name="location" class="form-select" onchange="this.form.submit()">
                                <option value="all" <?= (empty($selected_location) || $selected_location == 'all') ? 'selected' : '' ?>>عرض الجميع</option>
                                <?php if (!empty($work_locations)): ?>
                                    <?php foreach ($work_locations as $location): ?>
                                        <option value="<?= htmlspecialchars($location) ?>" 
                                            <?= ($selected_location == $location) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($location) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <?php if (!empty($selected_location) && $selected_location != 'all'): ?>
                                <a href="<?= base_url('pipeline/index/' . $job['id']) ?>" class="btn btn-outline-danger">
                                    <i class="fas fa-times me-1"></i> إلغاء الفلترة
                                </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="kanban-board-wrapper">
        <!-- Display filter status if active -->
        <?php if (!empty($selected_location) && $selected_location != 'all'): ?>
            <div class="alert alert-info mb-3">
                <i class="fas fa-filter me-2"></i>
                تم فلترة المتقدمين حسب موقع العمل: <strong><?= htmlspecialchars($selected_location) ?></strong>
                - العدد الإجمالي: <strong><?= array_sum(array_map('count', $stages)) ?></strong>
            </div>
        <?php endif; ?>
        
        <div class="kanban-board">
            
            <?php foreach ($stages as $status_name => $apps_in_stage): ?>
                <div class="kanban-column" data-status="<?= htmlspecialchars($status_name) ?>">
                    <div class="kanban-column-header">
                        <span><?= $status_name ?></span>
                        <span class="badge bg-dark rounded-pill"><?= count($apps_in_stage) ?></span>
                    </div>
                    
                    <div class="kanban-card-list" 
                         data-status="<?= htmlspecialchars($status_name) ?>">
                        
                        <?php foreach ($apps_in_stage as $app): ?>
                            <div class="kanban-card" data-id="<?= $app['id'] ?>">
                                <h6><?= htmlspecialchars($app['full_name']) ?></h6>
                                <small class="kanban-card-email"><?= htmlspecialchars($app['email']) ?></small>
                                
                                <!-- Display work location badge -->
                                <?php if (!empty($app['work_location'])): ?>
                                    <div class="mt-1">
                                        <span class="badge bg-info text-white">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            <?= htmlspecialchars($app['work_location']) ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="mt-2">
                                    <a href="<?= base_url('candidates/view/' . $app['id']) ?>" class="btn btn-sm btn-outline-primary py-0 px-2">
                                        <i class="fas fa-user"></i> عرض
                                    </a>
                                    <?php if ($app['cv_file'] != 'N/A' && !empty($app['cv_file'])): ?>
                                    <a href="<?= base_url('assets/cvs/' . $app['cv_file']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary py-0 px-2">
                                        <i class="fas fa-file-pdf"></i> CV
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<!-- SortableJS Library -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<!-- Custom CSS for Kanban -->
<style>
.kanban-board-wrapper {
    overflow-x: auto;
    padding-bottom: 10px;
}

.kanban-board {
    display: flex;
    gap: 15px;
    min-width: 1200px;
    padding: 10px 5px;
}

.kanban-column {
    flex: 1;
    min-width: 280px;
    background: #f8f9fa;
    border-radius: 8px;
    padding: 10px;
    border: 1px solid #dee2e6;
}

.kanban-column-header {
    background: #2c3e50;
    color: white;
    padding: 10px 15px;
    border-radius: 6px;
    margin-bottom: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: bold;
}

.kanban-card-list {
    min-height: 400px;
    max-height: 75vh;
    overflow-y: auto;
    padding: 5px;
}

.kanban-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 12px;
    margin-bottom: 10px;
    cursor: move;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.kanban-card:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.kanban-card h6 {
    margin-bottom: 5px;
    color: #2c3e50;
    font-size: 14px;
}

.kanban-card-email {
    color: #6c757d;
    font-size: 12px;
    display: block;
    margin-bottom: 8px;
}

.kanban-ghost-card {
    opacity: 0.4;
    background: #e9ecef;
}

/* Style for filtered cards */
<?php if (!empty($selected_location) && $selected_location != 'all'): ?>
.kanban-card {
    border-left: 3px solid #17a2b8;
}
<?php endif; ?>

/* Scrollbar styling */
.kanban-card-list::-webkit-scrollbar {
    width: 6px;
}

.kanban-card-list::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.kanban-card-list::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}

.kanban-card-list::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Responsive adjustments */
@media (max-width: 1400px) {
    .kanban-board {
        min-width: 1100px;
    }
    .kanban-column {
        min-width: 250px;
    }
}

@media (max-width: 1200px) {
    .kanban-board {
        min-width: 1000px;
    }
    .kanban-column {
        min-width: 220px;
    }
}

/* Notification styles */
.status-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 300px;
    max-width: 400px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Find all columns
    var columns = document.querySelectorAll('.kanban-card-list');
    
    // 2. Initialize Sortable for each column
    columns.forEach(function(column) {
        new Sortable(column, {
            group: 'kanban', // This allows dragging between columns
            animation: 150,
            ghostClass: 'kanban-ghost-card', // The style for the placeholder
            dragClass: 'kanban-drag-card',
            
            // 3. This is the magic: "onEnd" event
            // This function runs AFTER you drop a card
            onEnd: function (evt) {
                // Get the card that was moved
                var itemEl = evt.item;
                
                // Get the new column it was dropped into
                var toColumn = evt.to;
                
                // Get the Application ID from the card's "data-id"
                var applicationId = itemEl.getAttribute('data-id');
                
                // Get the New Status from the column's "data-status"
                var newStatus = toColumn.getAttribute('data-status');

                console.log('Moving App ID: ' + applicationId + ' to Status: ' + newStatus);

                // 4. Send the update to the server (AJAX)
                updateApplicantStatus(applicationId, newStatus);
            }
        });
    });
});

/**
 * Sends the new status to our CodeIgniter controller via AJAX
 */
function updateApplicantStatus(applicationId, newStatus) {
    // Get current filter value from URL
    const urlParams = new URLSearchParams(window.location.search);
    const locationFilter = urlParams.get('location') || 'all';
    
    // We use the Fetch API (modern AJAX)
    fetch('<?= base_url('pipeline/update_status') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            application_id: applicationId,
            new_status: newStatus
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Status updated successfully!');
            
            // Show success notification
            showNotification('تم تحديث الحالة بنجاح!', 'success');
            
            // Wait a moment for user to see the notification, then refresh
            setTimeout(() => {
                if (locationFilter !== 'all') {
                    // Refresh with filter parameter
                    window.location.href = `?location=${encodeURIComponent(locationFilter)}`;
                } else {
                    // Refresh without filter
                    location.reload();
                }
            }, 1000);
        } else {
            console.error('Failed to update status:', data.message);
            showNotification('حدث خطأ في تحديث حالة المتقدم!', 'error');
            
            // Reload after error
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    })
    .catch(error => {
        console.error('AJAX Error:', error);
        showNotification('خطأ في الاتصال بالخادم!', 'error');
        
        // Reload after error
        setTimeout(() => {
            location.reload();
        }, 2000);
    });
}

/**
 * Shows a notification message
 */
function showNotification(message, type = 'info') {
    // Remove existing notification if any
    const existingNotification = document.querySelector('.status-notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    // Determine alert class based on type
    let alertClass = 'alert-info';
    let icon = 'info-circle';
    
    if (type === 'success') {
        alertClass = 'alert-success';
        icon = 'check-circle';
    } else if (type === 'error') {
        alertClass = 'alert-danger';
        icon = 'exclamation-circle';
    }
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `status-notification alert ${alertClass} alert-dismissible fade show`;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;
    
    notification.innerHTML = `
        <i class="fas fa-${icon} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 3000);
}

/**
 * Optional: Add keyboard shortcuts for filter
 */
document.addEventListener('keydown', function(e) {
    // Ctrl+F for filter (Cmd+F on Mac)
    if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
        e.preventDefault();
        const filterSelect = document.querySelector('select[name="location"]');
        if (filterSelect) {
            filterSelect.focus();
        }
    }
    
    // Escape to clear filter
    if (e.key === 'Escape' && window.location.search.includes('location')) {
        const clearBtn = document.querySelector('a.btn-outline-danger');
        if (clearBtn) {
            window.location.href = clearBtn.href;
        }
    }
});
</script>