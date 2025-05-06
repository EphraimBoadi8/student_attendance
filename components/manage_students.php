<?php
function renderManageStudents() {
    ?>
    <div class="content" id="manage_students" style="display:none; width:80vw; padding:20px; background-color: #f8f9fa; min-height: 100vh;">
        <div class="container-fluid" style="padding:10px; background-color: white; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2 class="mb-4" style="color: #2c3e50; font-weight: 600; border-bottom: 2px solid #eee; padding-bottom: 10px;">Manage Students</h2>
                    
                    <!-- Search and Add Student Section -->
                    <div class="card mb-4" style="border: none; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <div class="card-body" style="padding: 20px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group" style="box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-radius: 6px; overflow: hidden;">
                                        <input type="text" class="form-control" id="studentSearch" placeholder="Search students..." style="border: 1px solid #dee2e6; padding: 10px 15px; font-size: 0.95rem;">
                                        <button class="btn btn-primary" type="button" style="padding: 10px 20px; background-color: #0d6efd; border: none; transition: all 0.3s ease;">
                                            <i class="fas fa-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal" style="padding: 10px 20px; background-color: #198754; border: none; transition: all 0.3s ease;">
                                        <i class="fas fa-plus"></i> Add New Student
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Students Table -->
                    <div class="card" style="border: none; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <div class="card-body" style="padding: 20px;">
                            <div class="table-responsive">
                                <table class="table table-hover" style="margin-bottom: 0;">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #f8f9fa; font-weight: 600; color: #495057; border-bottom: 2px solid #dee2e6; padding: 15px;">ID</th>
                                            <th style="background-color: #f8f9fa; font-weight: 600; color: #495057; border-bottom: 2px solid #dee2e6; padding: 15px;">Name</th>
                                            <th style="background-color: #f8f9fa; font-weight: 600; color: #495057; border-bottom: 2px solid #dee2e6; padding: 15px;">Email</th>
                                            <th style="background-color: #f8f9fa; font-weight: 600; color: #495057; border-bottom: 2px solid #dee2e6; padding: 15px;">Class</th>
                                            <th style="background-color: #f8f9fa; font-weight: 600; color: #495057; border-bottom: 2px solid #dee2e6; padding: 15px;">Status</th>
                                            <th style="background-color: #f8f9fa; font-weight: 600; color: #495057; border-bottom: 2px solid #dee2e6; padding: 15px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="studentsTableBody" style="transition: background-color 0.2s ease;">
                                        <!-- Table content will be dynamically populated -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Student Modal -->
        <div class="modal fade" id="addStudentModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="border: none; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
                    <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6; border-radius: 10px 10px 0 0;">
                        <h5 class="modal-title" style="font-weight: 600; color: #495057;">Add New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" style="padding: 20px;">
                        <form id="addStudentForm">
                            <div class="mb-3">
                                <label for="studentName" class="form-label" style="font-weight: 500; color: #495057; margin-bottom: 8px;">Full Name</label>
                                <input type="text" class="form-control" id="studentName" required style="border: 1px solid #dee2e6; padding: 10px 15px; font-size: 0.95rem;">
                            </div>
                            <div class="mb-3">
                                <label for="studentEmail" class="form-label" style="font-weight: 500; color: #495057; margin-bottom: 8px;">Email</label>
                                <input type="email" class="form-control" id="studentEmail" required style="border: 1px solid #dee2e6; padding: 10px 15px; font-size: 0.95rem;">
                            </div>
                            <div class="mb-3">
                                <label for="studentClass" class="form-label" style="font-weight: 500; color: #495057; margin-bottom: 8px;">Class</label>
                                <select class="form-select" id="studentClass" required style="border: 1px solid #dee2e6; padding: 10px 15px; font-size: 0.95rem;">
                                    <option value="">Select Class</option>
                                    <!-- Class options will be dynamically populated -->
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #dee2e6; padding: 15px 20px;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 8px 16px; background-color: #6c757d; border: none; border-radius: 6px;">Close</button>
                        <button type="button" class="btn btn-primary" id="saveStudent" style="padding: 8px 16px; background-color: #0d6efd; border: none; border-radius: 6px;">Save Student</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Main Container Styling */
        .content {
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Card Styling */
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        /* Table Styling */
        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
            padding: 15px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            color: #6c757d;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Button Styling */
        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-1px);
        }

        .btn-success {
            background-color: #198754;
            border: none;
        }

        .btn-success:hover {
            background-color: #157347;
            transform: translateY(-1px);
        }

        /* Search Bar Styling */
        .input-group {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            border-radius: 6px;
            overflow: hidden;
        }

        .form-control {
            border: 1px solid #dee2e6;
            padding: 10px 15px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        /* Modal Styling */
        .modal-content {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            border-radius: 10px 10px 0 0;
        }

        .modal-title {
            font-weight: 600;
            color: #495057;
        }

        .modal-body {
            padding: 20px;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }

        /* Status Indicators */
        .status-active {
            color: #198754;
            font-weight: 500;
            padding: 5px 10px;
            background-color: rgba(25, 135, 84, 0.1);
            border-radius: 4px;
        }

        .status-inactive {
            color: #dc3545;
            font-weight: 500;
            padding: 5px 10px;
            background-color: rgba(220, 53, 69, 0.1);
            border-radius: 4px;
        }

        /* Action Buttons */
        .btn-action {
            padding: 6px 12px;
            margin: 0 3px;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .btn-edit {
            background-color: #0dcaf0;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .content {
                width: 100vw !important;
                padding: 10px !important;
            }
            
            .container-fluid {
                padding: 5px !important;
            }
            
            .table th, .table td {
                padding: 10px !important;
            }
        }
    </style>

    <script>
        // JavaScript functions will be added here to handle:
        // 1. Loading students data
        // 2. Search functionality
        // 3. Add/Edit/Delete operations
        // 4. Form validation
    </script>
    <?php
}
?> 