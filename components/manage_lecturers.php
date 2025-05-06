<?php
function renderManageLecturers() {
    ?>
    <div class="content" id="manage_lecturers" style="display:none; width: 80vw;">
        <h2>Manage Lecturers</h2>
        
        <!-- Add Lecturer Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Add New Lecturer</h4>
            </div>
            <div class="card-body">
                <form id="addLecturerForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lecturerName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="lecturerName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lecturerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="lecturerEmail" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lecturerPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="lecturerPhone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lecturerDepartment" class="form-label">Department</label>
                            <select class="form-select" id="lecturerDepartment" required>
                                <option value="">Select Department</option>
                                <option value="computer_science">Computer Science</option>
                                <option value="mathematics">Mathematics</option>
                                <option value="physics">Physics</option>
                                <option value="engineering">Engineering</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Lecturer</button>
                </form>
            </div>
        </div>

        <!-- Lecturers Table -->
        <div class="card">
            <div class="card-header">
                <h4>Lecturers List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="lecturersTableBody">
                            <!-- Table content will be dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listener for form submission
        document.getElementById('addLecturerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('Form submitted! Add your AJAX call here.');
        });

        // Function to load lecturers (to be implemented)
        function loadLecturers() {
            // Add your AJAX call to fetch lecturers here
        }

        // Call loadLecturers when the page loads
        document.addEventListener('DOMContentLoaded', loadLecturers);
    </script>
    <?php
}
?> 