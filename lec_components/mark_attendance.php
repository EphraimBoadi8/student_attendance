<?php
// Mark Attendance Page
?>
<div class="mark-attendance-container">
    <h2>Mark Attendance</h2>
    
    <form action="process_attendance.php" method="POST" class="attendance-form">
        <div class="form-group">
            <label for="class">Select Class:</label>
            <select name="class" id="class" required>
                <option value="">Select a class</option>
                <option value="class_a">Class A</option>
                <option value="class_b">Class B</option>
                <option value="class_c">Class C</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="students-list">
            <h3>Students</h3>
            <div class="attendance-grid">
                <div class="student-row header">
                    <span>Student Name</span>
                    <span>Status</span>
                </div>
                <!-- Sample student rows - Replace with dynamic data -->
                <div class="student-row">
                    <span>John Doe</span>
                    <div class="status-buttons">
                        <label>
                            <input type="radio" name="status[1]" value="present" checked> Present
                        </label>
                        <label>
                            <input type="radio" name="status[1]" value="absent"> Absent
                        </label>
                    </div>
                </div>
                <div class="student-row">
                    <span>Jane Smith</span>
                    <div class="status-buttons">
                        <label>
                            <input type="radio" name="status[2]" value="present" checked> Present
                        </label>
                        <label>
                            <input type="radio" name="status[2]" value="absent"> Absent
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn">Save Attendance</button>
            <a href="dashboard.php" class="cancel-btn">Cancel</a>
        </div>
    </form>
</div>

<style>
.mark-attendance-container {
    padding: 20px;
    max-width: 800px;
    margin: 0 auto;
}

.attendance-form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
}

.form-group select,
.form-group input[type="date"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.students-list {
    margin-top: 30px;
}

.attendance-grid {
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
}

.student-row {
    display: grid;
    grid-template-columns: 2fr 1fr;
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

.student-row.header {
    background: #f8f9fa;
    font-weight: 600;
}

.status-buttons {
    display: flex;
    gap: 15px;
}

.status-buttons label {
    display: flex;
    align-items: center;
    gap: 5px;
    cursor: pointer;
}

.form-actions {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.submit-btn,
.cancel-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
}

.submit-btn {
    background: #3498db;
    color: white;
}

.submit-btn:hover {
    background: #2980b9;
}

.cancel-btn {
    background: #e74c3c;
    color: white;
}

.cancel-btn:hover {
    background: #c0392b;
}
</style> 