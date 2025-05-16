<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .sidebar-header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #34495e;
        }

        .nav-menu {
            list-style: none;
            margin-top: 20px;
            flex-grow: 1;
        }

        .nav-item {
            padding: 12px 15px;
            margin: 5px 0;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-item:hover {
            background-color: #34495e;
        }

        .nav-item.active {
            background-color: #3498db;
        }

        .nav-item i {
            margin-right: 10px;
        }

        .logout-btn {
            margin-top: auto;
            padding: 12px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s;
            font-size: 14px;
            font-weight: 500;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .logout-btn i {
            font-size: 16px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f5f6fa;
        }

        .content-section {
            display: none;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .content-section.active {
            display: block;
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .attendance-form {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-group select, .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .student-attendance-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            border-bottom: 1px solid #eee;
            margin-bottom: 8px;
        }

        .student-attendance-item:last-child {
            border-bottom: none;
        }

        .student-name {
            font-weight: 500;
            color: #2c3e50;
        }

        .attendance-options {
            display: flex;
            gap: 20px;
        }

        .attendance-options label {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            color: #666;
        }

        .attendance-options input[type="radio"] {
            margin: 0;
            cursor: pointer;
        }

        .attendance-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .attendance-header h3 {
            margin: 0;
            color: #2c3e50;
        }

        .btn {
            padding: 12px 24px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
        }

        .report-container {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        .report-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .report-header h3 {
            color: #2c3e50;
            margin: 0 0 10px 0;
        }

        .report-date {
            color: #666;
            font-size: 14px;
        }

        .report-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            text-align: center;
        }

        .stat-box h4 {
            color: #666;
            margin: 0 0 10px 0;
            font-size: 14px;
            font-weight: 500;
        }

        .stat-box .number {
            color: #2c3e50;
            font-size: 24px;
            font-weight: 600;
        }

        .attendance-details {
            margin-top: 20px;
        }

        .attendance-details h4 {
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .attendance-list {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 15px;
        }

        .attendance-list-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .attendance-list-item:last-child {
            border-bottom: none;
        }

        .student-status {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .status-present {
            background-color: #2ecc71;
        }

        .status-absent {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Lecturer Portal</h2>
            </div>
            <ul class="nav-menu">
                <li class="nav-item active" data-section="dashboard">
                    <i class="fas fa-home"></i> Dashboard
                </li>
                <li class="nav-item" data-section="mark-attendance">
                    <i class="fas fa-check-circle"></i> Mark Attendance
                </li>
                <li class="nav-item" data-section="generate-reports">
                    <i class="fas fa-chart-bar"></i> Generate Reports
                </li>
                <li class="nav-item" data-section="view-attendance">
                    <i class="fas fa-eye"></i> View Attendance
                </li>
            </ul>
            <button class="logout-btn" onclick="handleLogout()">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>

        <div class="main-content">
            <div id="dashboard" class="content-section active">
                <h2>Dashboard</h2>
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <h3>Total Students</h3>
                        <p id="total-students">0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Present Today</h3>
                        <p id="present-today">0</p>
                    </div>
                    <div class="stat-card">
                        <h3>Absent Today</h3>
                        <p id="absent-today">0</p>
                    </div>
                </div>
            </div>

            <div id="mark-attendance" class="content-section">
                <h2>Mark Attendance</h2>
                <form class="attendance-form" id="attendance-form">
                    <div class="attendance-header">
                        <div class="form-group">
                            <label for="course">Select Course</label>
                            <select id="course" required>
                                <option value="">Select a course</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" required>
                        </div>
                    </div>
                    <div id="students-list"></div>
                    <button type="submit" class="btn">Submit Attendance</button>
                </form>
            </div>

            <div id="generate-reports" class="content-section">
                <h2>Generate Reports</h2>
                <div class="form-group">
                    <label for="report-course">Select Course</label>
                    <select id="report-course">
                        <option value="">Select a course</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="report-date">Select Date</label>
                    <input type="date" id="report-date">
                </div>
                <button class="btn" onclick="generateReport()">Generate Report</button>
                <div id="report-results"></div>
            </div>

            <div id="view-attendance" class="content-section">
                <h2>View Attendance</h2>
                <div class="form-group">
                    <label for="view-course">Select Course</label>
                    <select id="view-course">
                        <option value="">Select a course</option>
                    </select>
                </div>
                <div id="attendance-table"></div>
            </div>
        </div>
    </div>

    <script>
        // Mock Database
        const mockDB = {
            courses: [
                { id: 1, name: 'Web Development' },
                { id: 2, name: 'Database Systems' },
                { id: 3, name: 'Software Engineering' }
            ],
            students: [
                { id: 1, name: 'John Doe', courseId: 1 },
                { id: 2, name: 'Jane Smith', courseId: 1 },
                { id: 3, name: 'Mike Johnson', courseId: 2 },
                { id: 4, name: 'Sarah Williams', courseId: 2 },
                { id: 5, name: 'David Brown', courseId: 3 }
            ],
            attendance: []
        };

        // Navigation
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
                item.classList.add('active');
                
                const section = item.getAttribute('data-section');
                document.querySelectorAll('.content-section').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(section).classList.add('active');
            });
        });

        // Populate course dropdowns
        function populateCourses() {
            const courseSelects = ['course', 'report-course', 'view-course'];
            courseSelects.forEach(selectId => {
                const select = document.getElementById(selectId);
                mockDB.courses.forEach(course => {
                    const option = document.createElement('option');
                    option.value = course.id;
                    option.textContent = course.name;
                    select.appendChild(option);
                });
            });
        }

        // Update dashboard stats
        function updateDashboardStats() {
            const today = new Date().toISOString().split('T')[0];
            const todayAttendance = mockDB.attendance.filter(a => a.date === today);
            
            document.getElementById('total-students').textContent = mockDB.students.length;
            document.getElementById('present-today').textContent = 
                todayAttendance.filter(a => a.status === 'present').length;
            document.getElementById('absent-today').textContent = 
                todayAttendance.filter(a => a.status === 'absent').length;
        }

        // Handle attendance form
        document.getElementById('attendance-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const courseId = document.getElementById('course').value;
            const date = document.getElementById('date').value;
            
            const students = mockDB.students.filter(s => s.courseId === parseInt(courseId));
            students.forEach(student => {
                const status = document.querySelector(`input[name="attendance_${student.id}"]:checked`).value;
                mockDB.attendance.push({
                    studentId: student.id,
                    courseId: parseInt(courseId),
                    date: date,
                    status: status
                });
            });
            
            alert('Attendance marked successfully!');
            updateDashboardStats();
        });

        // Generate report
        function generateReport() {
            const courseId = document.getElementById('report-course').value;
            const date = document.getElementById('report-date').value;
            
            if (!courseId || !date) {
                alert('Please select both course and date');
                return;
            }

            const course = mockDB.courses.find(c => c.id === parseInt(courseId));
            const reportData = mockDB.attendance.filter(a => 
                a.courseId === parseInt(courseId) && a.date === date
            );
            
            const presentCount = reportData.filter(a => a.status === 'present').length;
            const absentCount = reportData.filter(a => a.status === 'absent').length;
            const totalStudents = mockDB.students.filter(s => s.courseId === parseInt(courseId)).length;
            
            const reportResults = document.getElementById('report-results');
            reportResults.innerHTML = `
                <div class="report-container">
                    <div class="report-header">
                        <h3>${course.name} - Attendance Report</h3>
                        <div class="report-date">Date: ${new Date(date).toLocaleDateString()}</div>
                    </div>
                    
                    <div class="report-stats">
                        <div class="stat-box">
                            <h4>Total Students</h4>
                            <div class="number">${totalStudents}</div>
                        </div>
                        <div class="stat-box">
                            <h4>Present</h4>
                            <div class="number">${presentCount}</div>
                        </div>
                        <div class="stat-box">
                            <h4>Absent</h4>
                            <div class="number">${absentCount}</div>
                        </div>
                        <div class="stat-box">
                            <h4>Attendance Rate</h4>
                            <div class="number">${((presentCount / totalStudents) * 100).toFixed(1)}%</div>
                        </div>
                    </div>

                    <div class="attendance-details">
                        <h4>Detailed Attendance</h4>
                        <div class="attendance-list">
                            ${reportData.map(record => {
                                const student = mockDB.students.find(s => s.id === record.studentId);
                                return `
                                    <div class="attendance-list-item">
                                        <span class="student-name">${student.name}</span>
                                        <div class="student-status">
                                            <div class="status-indicator status-${record.status}"></div>
                                            <span>${record.status.charAt(0).toUpperCase() + record.status.slice(1)}</span>
                                        </div>
                                    </div>
                                `;
                            }).join('')}
                        </div>
                    </div>
                </div>
            `;
        }

        // View attendance
        document.getElementById('view-course').addEventListener('change', (e) => {
            const courseId = e.target.value;
            const attendanceTable = document.getElementById('attendance-table');
            
            const courseAttendance = mockDB.attendance.filter(a => a.courseId === parseInt(courseId));
            const students = mockDB.students.filter(s => s.courseId === parseInt(courseId));
            
            let tableHTML = `
                <table>
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            
            courseAttendance.forEach(record => {
                const student = students.find(s => s.id === record.studentId);
                tableHTML += `
                    <tr>
                        <td>${student.name}</td>
                        <td>${record.date}</td>
                        <td>${record.status}</td>
                    </tr>
                `;
            });
            
            tableHTML += '</tbody></table>';
            attendanceTable.innerHTML = tableHTML;
        });

        // Initialize
        populateCourses();
        updateDashboardStats();

        // Update students list when course is selected
        document.getElementById('course').addEventListener('change', (e) => {
            const courseId = e.target.value;
            const studentsList = document.getElementById('students-list');
            const students = mockDB.students.filter(s => s.courseId === parseInt(courseId));
            
            let html = '';
            students.forEach(student => {
                html += `
                    <div class="student-attendance-item">
                        <span class="student-name">${student.name}</span>
                        <div class="attendance-options">
                            <label>
                                <input type="radio" name="attendance_${student.id}" value="present" required>
                                Present
                            </label>
                            <label>
                                <input type="radio" name="attendance_${student.id}" value="absent" required>
                                Absent
                            </label>
                        </div>
                    </div>
                `;
            });
            
            studentsList.innerHTML = html;
        });

        // Add this to your existing JavaScript
        function handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                // In a real application, you would handle the logout process here
                // For now, we'll just redirect to the login page
                window.location.href = 'index.php';
            }
        }
    </script>
</body>
</html>
