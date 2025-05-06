<?php
function renderViewAttendance() {
    ?>
    <div class="content" id="view_attendance" style="display:none; width: 80vw;">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="mb-4">View Attendance Records</h2>
                    
                    <!-- Filters Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <form id="attendanceFilterForm" class="row g-3">
                                <div class="col-md-3">
                                    <label for="dateFilter" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="dateFilter">
                                </div>
                                <div class="col-md-3">
                                    <label for="classFilter" class="form-label">Class</label>
                                    <select class="form-select" id="classFilter">
                                        <option value="">All Classes</option>
                                        <!-- Class options will be populated dynamically -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="statusFilter" class="form-label">Status</label>
                                    <select class="form-select" id="statusFilter">
                                        <option value="">All Status</option>
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="late">Late</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Attendance Table -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Time In</th>
                                            <th>Status</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="attendanceTableBody">
                                        <!-- Table data will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Pagination -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="text-muted">
                                    Showing <span id="startRecord">1</span> to <span id="endRecord">10</span> of <span id="totalRecords">0</span> entries
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination mb-0">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .table th {
                background-color: #f8f9fa;
                font-weight: 600;
            }
            .status-present {
                color: #198754;
                font-weight: 500;
            }
            .status-absent {
                color: #dc3545;
                font-weight: 500;
            }
            .status-late {
                color: #ffc107;
                font-weight: 500;
            }
        </style>
    </div>
    <?php
}
?> 