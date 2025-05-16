<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #fff;
            padding: 10px 20px;
            margin: 5px 0;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .main-content {
            padding: 20px;
        }
        .stat-card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table-responsive {
            margin-top: 20px;
        }
        .action-buttons {
            margin-bottom: 20px;
        }
        .sidebar-footer {
            margin-top: auto;
            padding: 20px;
        }
        .logout-btn {
            width: 100%;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #c82333;
            color: white;
        }
        .logout-btn i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="d-flex flex-column h-100">
                    <h3 class="text-white text-center mb-4">Admin Panel</h3>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="#" data-page="dashboard">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        <a class="nav-link" href="#" data-page="students">
                            <i class="fas fa-user-graduate"></i> View All Students
                        </a>
                        <a class="nav-link" href="#" data-page="lecturers">
                            <i class="fas fa-chalkboard-teacher"></i> View All Lecturers
                        </a>
                        <a class="nav-link" href="#" data-page="attendance">
                            <i class="fas fa-clipboard-check"></i> View All Attendance
                        </a>
                    </nav>
                    <div class="sidebar-footer">
                        <a href="index.php" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="container-fluid" id="content">
                    <!-- Content will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalTitle">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm">
                        <input type="hidden" id="studentId">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="studentName" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="studentEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentCourse" class="form-label">Course</label>
                            <input type="text" class="form-control" id="studentCourse" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveStudent()">Save Student</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Lecturer Modal -->
    <div class="modal fade" id="addLecturerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lecturerModalTitle">Add New Lecturer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addLecturerForm">
                        <input type="hidden" id="lecturerId">
                        <div class="mb-3">
                            <label for="lecturerName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="lecturerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="lecturerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="lecturerEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="lecturerDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="lecturerDepartment" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveLecturer()">Save Lecturer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Mock data
        const mockData = {
            students: [
                { id: 1, name: "John Doe", email: "john@example.com", course: "Computer Science" },
                { id: 2, name: "Jane Smith", email: "jane@example.com", course: "Mathematics" },
                { id: 3, name: "Mike Johnson", email: "mike@example.com", course: "Physics" }
            ],
            lecturers: [
                { id: 1, name: "Dr. Brown", email: "brown@example.com", department: "Computer Science" },
                { id: 2, name: "Prof. Wilson", email: "wilson@example.com", department: "Mathematics" },
                { id: 3, name: "Dr. Davis", email: "davis@example.com", department: "Physics" }
            ],
            attendance: [
                { id: 1, student_name: "John Doe", course: "Computer Science", date: "2024-03-20", status: "Present" },
                { id: 2, student_name: "Jane Smith", course: "Mathematics", date: "2024-03-20", status: "Absent" },
                { id: 3, student_name: "Mike Johnson", course: "Physics", date: "2024-03-20", status: "Present" }
            ]
        };

        // Function to render dashboard
        function renderDashboard() {
            const content = `
                <h2 class="mb-4">Dashboard Overview</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="stat-card bg-primary text-white">
                            <h3><i class="fas fa-user-graduate"></i> Total Students</h3>
                            <h2>${mockData.students.length}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card bg-success text-white">
                            <h3><i class="fas fa-chalkboard-teacher"></i> Total Lecturers</h3>
                            <h2>${mockData.lecturers.length}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card bg-info text-white">
                            <h3><i class="fas fa-clipboard-check"></i> Total Attendance Records</h3>
                            <h2>${mockData.attendance.length}</h2>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('content').innerHTML = content;
        }

        // Function to render students table
        function renderStudents() {
            const content = `
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>All Students</h2>
                    <button class="btn btn-primary" onclick="openAddStudentModal()">
                        <i class="fas fa-plus"></i> Add New Student
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${mockData.students.map(student => `
                                <tr>
                                    <td>${student.id}</td>
                                    <td>${student.name}</td>
                                    <td>${student.email}</td>
                                    <td>${student.course}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="editStudent(${student.id})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteStudent(${student.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            `;
            document.getElementById('content').innerHTML = content;
        }

        // Function to render lecturers table
        function renderLecturers() {
            const content = `
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>All Lecturers</h2>
                    <button class="btn btn-primary" onclick="openAddLecturerModal()">
                        <i class="fas fa-plus"></i> Add New Lecturer
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${mockData.lecturers.map(lecturer => `
                                <tr>
                                    <td>${lecturer.id}</td>
                                    <td>${lecturer.name}</td>
                                    <td>${lecturer.email}</td>
                                    <td>${lecturer.department}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="editLecturer(${lecturer.id})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteLecturer(${lecturer.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            `;
            document.getElementById('content').innerHTML = content;
        }

        // Function to render attendance table
        function renderAttendance() {
            const content = `
                <h2 class="mb-4">All Attendance Records</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${mockData.attendance.map(record => `
                                <tr>
                                    <td>${record.id}</td>
                                    <td>${record.student_name}</td>
                                    <td>${record.course}</td>
                                    <td>${record.date}</td>
                                    <td>${record.status}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="editAttendance(${record.id})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteAttendance(${record.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            `;
            document.getElementById('content').innerHTML = content;
        }

        // Modal handling functions
        function openAddStudentModal() {
            document.getElementById('studentModalTitle').textContent = 'Add New Student';
            document.getElementById('studentId').value = '';
            document.getElementById('addStudentForm').reset();
            const modal = new bootstrap.Modal(document.getElementById('addStudentModal'));
            modal.show();
        }

        function openAddLecturerModal() {
            document.getElementById('lecturerModalTitle').textContent = 'Add New Lecturer';
            document.getElementById('lecturerId').value = '';
            document.getElementById('addLecturerForm').reset();
            const modal = new bootstrap.Modal(document.getElementById('addLecturerModal'));
            modal.show();
        }

        function editStudent(id) {
            const student = mockData.students.find(s => s.id === id);
            if (student) {
                document.getElementById('studentModalTitle').textContent = 'Edit Student';
                document.getElementById('studentId').value = student.id;
                document.getElementById('studentName').value = student.name;
                document.getElementById('studentEmail').value = student.email;
                document.getElementById('studentCourse').value = student.course;
                
                const modal = new bootstrap.Modal(document.getElementById('addStudentModal'));
                modal.show();
            }
        }

        function editLecturer(id) {
            const lecturer = mockData.lecturers.find(l => l.id === id);
            if (lecturer) {
                document.getElementById('lecturerModalTitle').textContent = 'Edit Lecturer';
                document.getElementById('lecturerId').value = lecturer.id;
                document.getElementById('lecturerName').value = lecturer.name;
                document.getElementById('lecturerEmail').value = lecturer.email;
                document.getElementById('lecturerDepartment').value = lecturer.department;
                
                const modal = new bootstrap.Modal(document.getElementById('addLecturerModal'));
                modal.show();
            }
        }

        function saveStudent() {
            const id = document.getElementById('studentId').value;
            const name = document.getElementById('studentName').value;
            const email = document.getElementById('studentEmail').value;
            const course = document.getElementById('studentCourse').value;

            if (name && email && course) {
                if (id) {
                    // Update existing student
                    const index = mockData.students.findIndex(s => s.id === parseInt(id));
                    if (index !== -1) {
                        mockData.students[index] = {
                            id: parseInt(id),
                            name: name,
                            email: email,
                            course: course
                        };
                    }
                } else {
                    // Add new student
                    const newStudent = {
                        id: mockData.students.length + 1,
                        name: name,
                        email: email,
                        course: course
                    };
                    mockData.students.push(newStudent);
                }
                
                // Close modal and reset form
                const modal = bootstrap.Modal.getInstance(document.getElementById('addStudentModal'));
                modal.hide();
                document.getElementById('addStudentForm').reset();
                
                // Refresh the students table
                renderStudents();
            }
        }

        function saveLecturer() {
            const id = document.getElementById('lecturerId').value;
            const name = document.getElementById('lecturerName').value;
            const email = document.getElementById('lecturerEmail').value;
            const department = document.getElementById('lecturerDepartment').value;

            if (name && email && department) {
                if (id) {
                    // Update existing lecturer
                    const index = mockData.lecturers.findIndex(l => l.id === parseInt(id));
                    if (index !== -1) {
                        mockData.lecturers[index] = {
                            id: parseInt(id),
                            name: name,
                            email: email,
                            department: department
                        };
                    }
                } else {
                    // Add new lecturer
                    const newLecturer = {
                        id: mockData.lecturers.length + 1,
                        name: name,
                        email: email,
                        department: department
                    };
                    mockData.lecturers.push(newLecturer);
                }
                
                // Close modal and reset form
                const modal = bootstrap.Modal.getInstance(document.getElementById('addLecturerModal'));
                modal.hide();
                document.getElementById('addLecturerForm').reset();
                
                // Refresh the lecturers table
                renderLecturers();
            }
        }

        // Navigation handling
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const page = e.target.closest('.nav-link').dataset.page;
                
                // Update active state
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                e.target.closest('.nav-link').classList.add('active');
                
                // Render content
                switch(page) {
                    case 'dashboard':
                        renderDashboard();
                        break;
                    case 'students':
                        renderStudents();
                        break;
                    case 'lecturers':
                        renderLecturers();
                        break;
                    case 'attendance':
                        renderAttendance();
                        break;
                }
            });
        });

        // Placeholder functions for edit and delete actions
        function deleteStudent(id) {
            if(confirm('Are you sure you want to delete this student?')) {
                mockData.students = mockData.students.filter(student => student.id !== id);
                renderStudents();
            }
        }

        function deleteLecturer(id) {
            if(confirm('Are you sure you want to delete this lecturer?')) {
                mockData.lecturers = mockData.lecturers.filter(lecturer => lecturer.id !== id);
                renderLecturers();
            }
        }

        function editAttendance(id) {
            alert(`Edit attendance ${id}`);
        }

        function deleteAttendance(id) {
            if(confirm('Are you sure you want to delete this attendance record?')) {
                mockData.attendance = mockData.attendance.filter(record => record.id !== id);
                renderAttendance();
            }
        }

        // Load dashboard by default
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('[data-page="dashboard"]').click();
        });
    </script>
</body>
</html>
