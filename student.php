<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-container {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .attendance-btn {
            width: 100%;
        }
        .course-list {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Student Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container dashboard-container">
        <div class="row">
            <!-- Ongoing Lectures Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Ongoing Lectures</h5>
                    </div>
                    <div class="card-body">
                        <div id="ongoingLectures">
                            <div class="alert alert-info">
                                No ongoing lectures at the moment.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Sign Attendance</h5>
                    </div>
                    <div class="card-body">
                        <form id="attendanceForm">
                            <div class="mb-3">
                                <label for="courseSelect" class="form-label">Select Course</label>
                                <select class="form-select" id="courseSelect" required>
                                    <option value="">Choose a course...</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success attendance-btn">Sign Attendance</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Courses Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">My Courses</h5>
                    </div>
                    <div class="card-body">
                        <div class="course-list" id="courseList">
                            <!-- Course items will be dynamically added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample data - In a real application, this would come from a backend
        const courses = [
            { id: 1, name: 'Web Development', instructor: 'Dr. Smith', schedule: 'Mon, Wed 10:00 AM' },
            { id: 2, name: 'Database Systems', instructor: 'Prof. Johnson', schedule: 'Tue, Thu 2:00 PM' },
            { id: 3, name: 'Software Engineering', instructor: 'Dr. Williams', schedule: 'Fri 1:00 PM' }
        ];

        // Function to populate courses
        function populateCourses() {
            const courseList = document.getElementById('courseList');
            const courseSelect = document.getElementById('courseSelect');
            
            courses.forEach(course => {
                // Add to course list
                const courseItem = document.createElement('div');
                courseItem.className = 'card mb-2';
                courseItem.innerHTML = `
                    <div class="card-body">
                        <h5 class="card-title">${course.name}</h5>
                        <p class="card-text">
                            <strong>Instructor:</strong> ${course.instructor}<br>
                            <strong>Schedule:</strong> ${course.schedule}
                        </p>
                    </div>
                `;
                courseList.appendChild(courseItem);

                // Add to attendance form select
                const option = document.createElement('option');
                option.value = course.id;
                option.textContent = course.name;
                courseSelect.appendChild(option);
            });
        }

        // Function to handle attendance submission
        document.getElementById('attendanceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const courseId = document.getElementById('courseSelect').value;
            if (courseId) {
                alert('Attendance marked successfully!');
                this.reset();
            }
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            populateCourses();
        });
    </script>
</body>
</html>